<?php
namespace SiteGround_Optimizer\Images_Optimizer;

use SiteGround_Optimizer\Supercacher\Supercacher;
use SiteGround_Optimizer\Options\Options;
use SiteGround_Optimizer\Helper\Helper;

/**
 * SG Images_Optimizer main plugin class
 */
class Images_Optimizer_Webp extends Abstract_Images_Optimizer {

	/**
	 * Array containing options used for status updates.
	 *
	 * @var array
	 */
	public $options_map = array(
		'completed' => 'siteground_optimizer_webp_conversion_completed',
		'status'    => 'siteground_optimizer_webp_conversion_status',
		'stopped'   => 'siteground_optimizer_webp_conversion_stopped',
	);

	/**
	 * The type of image optimization.
	 *
	 * @var string
	 */
	public $type = 'webp';

	/**
	 * The total non-converted images option.
	 *
	 * @var string
	 */
	public $non_optimized = 'siteground_optimizer_total_non_converted_images';

	/**
	 * The batch name.
	 *
	 * @var string
	 */
	public $batch_skipped = 'siteground_optimizer_is_converted_to_webp';

	/**
	 * The ajax action we are using.
	 *
	 * @var string
	 */
	public $action = 'siteground_optimizer_start_webp_conversion';
	/**
	 * Array containing all process
	 *
	 * @var array
	 */
	public $process_map = array(
		'filter'   => 'siteground_optimizer_webp_conversion_timeout',
		'attempts' => 'siteground_optimizer_webp_conversion_attempts',
		'failed'   => 'siteground_optimizer_webp_conversion_failed',
	);

	/**
	 * The type of cron we want to fire.
	 *
	 * @var string
	 */
	public $cron_type = 'siteground_optimizer_start_webp_conversion_cron';

	/**
	 * The process lock we are using.
	 *
	 * @var string
	 */
	public $process_lock = 'siteground_optimizer_webp_conversion_lock';

	/**
	 * Optimize the image
	 *
	 * @since  5.0.0
	 *
	 * @param  int   $id       The image id.
	 * @param  array $metadata The image metadata.
	 *
	 * @return bool     True on success, false on failure.
	 */
	public function optimize( $id, $metadata ) {
		// Load the uploads dir.
		$upload_dir = wp_get_upload_dir();
		// Get path to main image.
		$main_image = get_attached_file( $id );
		// Get the basename.
		$basename = basename( $main_image );

		// Get the command placeholder. It will be used by main image and to optimize the different image sizes.
		$status = $this->generate_webp_file( $main_image );

		// conversion failed.
		if ( true === boolval( $status ) ) {
			return false;
		}

		if ( ! empty( $metadata['sizes'] ) ) {
			// Loop through all image sizes and optimize them as well.
			foreach ( $metadata['sizes'] as $size ) {
				// Replace main image with the cropped image and run the conversion command.
				$status = $this->generate_webp_file( str_replace( $basename, $size['file'], $main_image ) );

				// conversion failed.
				if ( true === boolval( $status ) ) {
					return false;
				}
			}
		}

		// Everything ran smoothly.
		update_post_meta( $id, 'siteground_optimizer_is_converted_to_webp', 1 );
		return true;
	}

	/**
	 * Check if image exists and perform optimiation.
	 *
	 * @since  5.0.0
	 *
	 * @param  string $filepath The path to the file.
	 *
	 * @return bool             False on success, true on failure.
	 */
	public static function generate_webp_file( $filepath ) {
		// Bail if the file doens't exists or if the webp copy already exists.
		if ( ! file_exists( $filepath ) || file_exists( $filepath . '.webp' ) ) {
			return true;
		}

		// Get image type.
		$type = exif_imagetype( $filepath );

		// Prepare the quality parameters.
		switch ( get_option( 'siteground_optimizer_quality_type', 'lossless' ) ) {
			case 'lossy':
				$quality      = get_option( 'siteground_optimizer_quality_webp', 85 );
				$quality_type = ' ';
				break;
			case 'lossless':
			default:
				$quality      = 100;
				$quality_type = '-lossless';
				break;
		}

		switch ( $type ) {
			case IMAGETYPE_GIF:
				$placeholder = 'gif2webp -q %1$s %2$s %3$s -o %3$s.webp 2>&1';
				break;

			case IMAGETYPE_JPEG:
				$placeholder = 'cwebp -q %1$s %2$s %3$s -o %3$s.webp 2>&1';
				break;

			case IMAGETYPE_PNG:
				// Bail if the image is bigger than 500k.
				// PNG usage is not recommended and images bigger than 500kb
				// hit the limits.
				if ( filesize( $filepath ) > self::PNGS_SIZE_LIMIT ) {
					return true;
				}
				$placeholder = 'cwebp -q %1$s %2$s %3$s -o %3$s.webp 2>&1';
				break;

			default:
				// Bail if the image type is not supported.
				return true;
		}

		// Optimize the image.
		exec(
			sprintf(
				$placeholder, // The command.
				$quality, // The quality %.
				$type, // The quality %.
				$filepath // Image path.
			),
			$output,
			$status
		);

		return $status;
	}

	/**
	 * Delete all Webp files.
	 *
	 * @since  5.4.0
	 *
	 * @return bool Tru on success, false on failure.
	 */
	public function delete_webp_files() {
		$basedir = Helper::get_uploads_dir();
		exec( "find $basedir -name '*.webp' -type f -print0 | xargs -L 500 -0 rm", $output, $result );

		$this->reset_image_optimization_status();

		return $result;
	}

	/**
	 * Delete a webp copy, when the original image is deleted.
	 *
	 * @since  5.4.0
	 *
	 * @param  int $id The attachment ID.
	 */
	public function delete_webp_copy( $id ) {
		$main_image = get_attached_file( $id );
		$metadata   = wp_get_attachment_metadata( $id );

		$files    = array( $main_image . '.webp' );
		$basename = basename( $main_image );

		if ( ! empty( $metadata['sizes'] ) ) {
			// Loop through all image sizes and optimize them as well.
			foreach ( $metadata['sizes'] as $size ) {
				$files[] = str_replace( $basename, $size['file'], $main_image ) . '.webp';
			}
		}

		if ( ! empty( $files ) ) {
			exec( 'rm ' . implode( ' ', $files ) );
		}
	}

	/**
	 * Regenerate the webp copies, when the original images is edited.
	 *
	 * @since  5.4.0
	 *
	 * @param  int $id The attachment id.
	 */
	public function regenerate_webp_copy( $id ) {
		$this->delete_webp_copy( $id );
		$metadata = wp_get_attachment_metadata( $id );

		$this->optimize( $id, $metadata );
	}
}
