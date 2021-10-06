<?php
/**
 * Template Name: Home
 *
 * Home template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();

//calculate ago time from updated_at 
function time_elapsed_string($date)
{
	$timestamp = strtotime($date);	
	   
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	
	if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		$diff = $diff / $length[$i];
		}

		$diff = round($diff);
		return "Last edit: ".$diff . " " . $strTime[$i] . "s ago ";
	}
}

global $wpdb;
$current_user_id = get_current_user_id();

$creation_table = $wpdb->prefix."tbl_creation";
$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' ", ARRAY_A );

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />

	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="row mx-0">
            <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/dot-banner.jpg" width="100%">        
        </div>
        <div class="container py-5 px-0">
            <div class="row m-0 creation-row">
                <h4 class="section-link"><a href="">My Creations</a></h4>
				<?php 
					if(count($creation_result) >= 0){
						foreach($creation_result as $creation_data){
							if($creation_data['type'] == 'topic'){
								$color_class = 'topic_color';
							} else if($creation_data['type'] == 'network'){
								$color_class = 'network_color';
							} else if($creation_data['type'] == 'experience'){
								$color_class = 'experience_color';
							} else {
								$color_class = '';
							} 
						?>
							<a href="<?php echo esc_url( home_url( ) ); ?>/edit-topic-notes/?edit_id=<?php echo $creation_data['id']; ?>">
							<div class="mycreation-box <?php echo $color_class;  ?>">
								<i class="creaton-dot"></i>
								<i class="creaton-dot"></i>
								<i class="creaton-dot"></i>
								<h4 class="creation-heading m-0"><?php echo $creation_data['name']; ?></h4>
								<p class="creation-info m-0"><?php echo time_elapsed_string($creation_data['updated_at']); ?></p>
							</div>
						</a>
						<?php
						}
					} else {
						echo '<h2 class="no_data">No Data Found</h2>';
					}
				?>
                
                
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
