<?php
/**
 * Template Name: Deleted Creations
 *
 * Deleted Creations template.
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

if(isset($_GET['res_id']) && $_GET['res_id'] != '' ){
	$res_id = $_GET['res_id'];
	
	$sqlUpdate = "update {$creation_table} set status='active' where id={$res_id} and user_id={$current_user_id}";
			
	$wpdb->query($sqlUpdate);
}

$creation_result = $wpdb->get_results( "SELECT * from {$creation_table} where user_id = '{$current_user_id}' and status = 'deactive' ", ARRAY_A );

?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Athiti:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<style>
.dot_sec {
    position: absolute;
    right: 0px;
    top: 50%;
    transform: translateY(-50%);
    height: 100%;
    display: flex;
    justify-content: center;
    padding-right: 10px;
    padding-left: 10px;
}
.creation-row .mycreation-box .creaton-dot{
	margin: 2px 0px;
}
.creation-row .topic_purple{
    background: rgba(196, 196, 196);
    background: radial-gradient(circle, rgba(89, 62, 151, 0.6) -22%, rgba(196, 196, 196, 0.2) 85%);
}
.creation-row .topic_black{
    background: rgba(196, 196, 196);
    background: radial-gradient(circle, rgba(8, 0, 28, 0.4) -12%, rgba(196, 196, 196, 0.2) 85%);
}
.creation-row .topic_blue{
    background: rgba(196, 196, 196);
    background: radial-gradient(circle, rgba(180, 188, 252, 0.9) 5%, rgba(196, 196, 196, 0.2) 85%);
} 
.hover-menu {
    position: absolute;
    right: 0;
    top: 100%;
    align-items: center;
    background-color: #7B7A7A;
    width: 120px;
    border-radius: 8px;
    opacity: 1;
    z-index: 1;
    display: none;
    padding: 10px 0px;
}
.hover-menu ul {
    padding: 0px;
    margin: 0px;
    width: 100%;
}
.hover-menu ul li {
    padding-left: 38px;
    text-align: left;
    display: block;
    width: 100%;
    color: #fff;
    font-size: 16px;
    position: relative;
}
.hover-menu ul li a:hover, .hover-menu ul li a:focus{
	color: #fff;
}
.main-dot:hover .hover-menu {
	display: flex!important;
}
.hover-menu ul li img {
    position: absolute;
    left: 13px;
    top: 57%;
    transform: translateY(-50%);
    width: 12px;
}
</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5 px-0">
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 col-sm-12">
                     <h4 class="section-link"><a href=""><u>Deleted Creations</u></a></h4>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle" aria-hidden="true"></i> Deleted items will be permanently removed after 30 days.</li>
                    </ul>
                </div>
            </div>
            <?php 
			if(count($creation_result) != '' && count($creation_result) > 0){
		?>
        <div class="container py-5 px-0">
            <div class="row m-0 creation-row">
                <h4 class="section-link"><a href="">My Creations</a></h4>
				<?php
						foreach($creation_result as $creation_data){
							if($creation_data['type'] == 'topic'){
								$color_class = 'topic_color';
								$link_name = 'edit-topic-notes';
							} else if($creation_data['type'] == 'network'){
								$color_class = 'network_color';
								$link_name = 'edit-network';
							} else if($creation_data['type'] == 'experience'){
								$color_class = 'experience_color';
								$link_name = 'edit-experience';
							} else {
								$color_class = '';
								$link_name = 'edit-topic-notes';
							} 
						?>
							
							<div class="mycreation-box <?php echo $color_class;  ?>">								
								<h4 class="creation-heading m-0"><?php echo $creation_data['name']; ?></h4>
								<p class="creation-info m-0"><?php echo time_elapsed_string($creation_data['updated_at']); ?></p>
								<div class="main-dot">
								<div class="dot_sec flex-column">
									<i class="creaton-dot"></i>
									<i class="creaton-dot"></i>
									<i class="creaton-dot"></i>
								</div>
								<div class="hover-menu">
									<ul>
										<li><a href="<?php echo esc_url( home_url( ) ); ?>/deleted-creations/?res_id=<?php echo $creation_data['id']; ?>" >Restore</a></li>
										
										
									</ul>
									<!--<ul>
										<li>Restore</li>
									</ul>-->
								</div>
								</div>
							</div>
						
				<?php
						}
					
				?>
            </div>
        </div>
		<?php 
			} else {
						?>
						<h2 class='no_data text-center yyy'>
					<?php
						echo "You didn't create any creation yet.";
					?>
						</h2>
				<?php
					}	
		?>
        </div>
	</div>
    <div class="modal deleted__modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-between">
                    <div class="mycreation-box" style="width:200px;">
                        <i class="fas fa-ellipsis-v creaton-dot"></i>
                        <h4 class="creation-heading m-0">SH resume</h4>
                        <p class="creation-info m-0">Last edit: 2 mints ago</p>
                    </div>
                    <button type="button" class="btn deleted__reset">Restore</button>
                </div>
            </div>
        </div>
    </div>
    <!-- #content -->
<?php get_footer(); ?>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.querySelector(".creaton-dot");
    btn.onclick = function() {
        modal.style.display = "block";
    }

    window.onclick = function(event) {
        if(event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
