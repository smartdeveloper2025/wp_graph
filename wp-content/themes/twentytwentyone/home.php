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
                <div class="mycreation-box">
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <h4 class="creation-heading m-0">SH resume</h4>
                    <p class="creation-info m-0">Last edit: 2 mints ago</p>

                </div>
                <div class="mycreation-box">
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <h4 class="creation-heading m-0">uni resume</h4>
                    <p class="creation-info m-0">Last edit: 5 mints ago</p>

                </div>
                <div class="mycreation-box">
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <h4 class="creation-heading m-0">job hunting network</h4>
                    <p class="creation-info m-0">Last edit: 7 mints ago</p>

                </div>
                <div class="mycreation-box">
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <h4 class="creation-heading m-0">shower thougths</h4>
                    <p class="creation-info m-0">Last edit: 22 mints ago</p>

                </div>
                <div class="mycreation-box">
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <i class="creaton-dot"></i>
                    <h4 class="creation-heading m-0">ANTh001 notes</h4>
                    <p class="creation-info m-0">Last edit: 22 mints ago</p>

                </div>
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
