<?php
/**
 * Template Name: Edit Experience
 *
 * Edit Experience template.
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
	<div id="content" class="content" role="main">
        <div class="container py-5">
            <div class="row mx-0">
                <h4 class="section-link"><a href=""><u>Experiences</u></a></h4>
                <div class="col-12 p-0">
                    <div class="d-flex justify-content-between">
                        <p class="form-text">Joy's Resume</p>
                        <p class="form-text">
                            <a href="Javascript:;" class="link mr-3">View Large</a>
                            <a href="Javascript:;" class="link"><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-7 col-md-7 col-sm-12 d-none d-lg-block d-md-block">
                    
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle"></i> Experience</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Skills</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Tools</li>
                    </ul>
                    <h5 class="m-0 mt-2">A Knomad creation</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="section-link mb-2"><a href="">Experience: 1</a></h4>
                </div>
                
                <div class="col-lg-7 col-md-7 col-sm-12 p-0">
                    <form method="post">
                        <div class="row m-0">
                            <div class="col-12">
                                <label><i class="fas fa-circle"></i> Name of Experience</label>
                                <p class="form-text">Huey</p>
                            </div>
                        </div>
                        <div class="mt-5 experience_row">
                            <div class="experience_row_box">
                                <h5>What skill did you learn or obtain during this experience?</h5>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> Website creation</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> Design Thinking</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="experience_row_box">
                                <h5>What tools/languages were used in this skill? </h5>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> <u>Webflow</u></li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> <u>Webflow</u></li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 mt-4 experience_row_box">
                            <div class="col-12">
                                <label>Outcomes & Achievers</label>
                                <!-- <input type="text" placeholder="Type Here" class="form-control creation_input"> -->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 mt-5">
                   <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/gg.jpg" width="100%">
                </div>
            </div>
            <div class="row m-0">
                <div class="col-lg-7 col-md-7 col-sm-12 mt-5">
                    <h4 class="section-link mb-2"><a href="javascript:;" class="d-flex align-items-center"><i class="fas fa-plus mr-2"></i> Experience 2:</a></h4>
                </div>
            </div>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
