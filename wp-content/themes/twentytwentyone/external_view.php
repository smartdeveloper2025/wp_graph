<?php
/**
 * Template Name: External View
 *
 * External Experience template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />

	<!-- Content -->
	<div id="content" class="content" role="main" style="background:#f5f5f5;">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h4 class="section-link mb-4"><a href="">SH Resume by Joey Wigglesworth</a></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 m-auto">
                    <p class="m-0">Description</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle"></i> Experience</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Skills</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Tools</li>
                    </ul>
                    <div class="row mt-3">
                        <div class="col-lg-6 col-md-6 col-sm-12 ml-auto">
                            <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/dot-png.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <h5 class="m-0 mt-5">A Knomad creation</h5>
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
