<?php
namespace SG_Security\I18n;

use SG_Security\Helper\Helper;

use CharlesRumley\PoToJson;

/**
 * I18n functions.
 */
class I18n {

	/**
	 * Load the plugin textdomain.
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'sg-security',
			false,
			'sg-security/languages'
		);
	}

	/**
	 * Update json translations on translations update.
	 *
	 * @since  5.5.5
	 *
	 * @param  {WP_Upgrader} $upgrader WP_Upgrader instance.
	 * @param  array         $extra    Array of bulk item update data.
	 */
	public function update_json_translations( $upgrader, $extra ) {
		// Bail if we don't update the translations.
		if (
			'update' !== $extra['action'] &&
			'translation' !== $extra['type']
		) {
			return;
		}

		// Bail if there are no translations.
		if ( empty( $extra['translations'] ) ) {
			return;
		}

		// Check for SG Security translations.
		$keys = array_keys( array_column( $extra['translations'], 'slug' ), 'sg-security' );

		// Bail if there are no plugin translations.
		if ( empty( $keys ) ) {
			return;
		}

		// Setup the WP Filesystem.
		$wp_filesystem = Helper::setup_wp_filesystem();

		// Init the convertor class.
		$po_to_json = new PoToJson();

		foreach ( $keys as $key ) {
			// Convert a PO file to Jed-compatible JSON.
			$json = $po_to_json
						->withPoFile( WP_CONTENT_DIR . '/languages/plugins/sg-security-' . $extra['translations'][ $key ]['language'] . '.po' )
						->toJedJson( false, 'sg-security' );

			// Convert and get the json content.
			$content = json_decode( $json, true );

			// Build the json filepath.
			$json_filepath = WP_CONTENT_DIR . '/languages/plugins/sg-security-' . $extra['translations'][ $key ]['language'] . '.json';

			// Create the file if donesn't exists.
			if ( ! is_file( $json_filepath ) ) {
				// Create the new file.
				$wp_filesystem->touch( $json_filepath );
			}

			// Add the translations to the file.
			$wp_filesystem->put_contents(
				$json_filepath,
				json_encode( $content['locale_data']['sg-security'] )
			);
		}
	}

	/**
	 * Get i18n strings as a JSON-encoded string
	 *
	 * @since 5.0.0
	 *
	 * @return string The locale as JSON
	 */
	public static function get_i18n_data_json() {
		// Get the user locale.
		$locale = get_user_locale();

		// Possible langugaes paths.
		$dirs = array(
			'wp-content/languages/plugins/',
			'wp-content/plugins/sg-security/languages/json/',
		);

		foreach ( $dirs as $dir ) {
			// Build the full path to the file.
			$i18n_json = ABSPATH . $dir . 'sg-security-' . $locale . '.json';

			// Check if the files exists and it's readable.
			if ( is_file( $i18n_json ) && is_readable( $i18n_json ) ) {
				// Get the locale data.
				$locale_data = @file_get_contents( $i18n_json );
				if ( $locale_data ) {
					return $locale_data;
				}
			}
		}


		// Return valid empty Jed locale.
		return json_encode(
			array(
				'' => array(
					'domain' => 'sg-security',
					'lang'   => is_admin() ? get_user_locale() : get_locale(),
				),
			)
		);
	}
}
