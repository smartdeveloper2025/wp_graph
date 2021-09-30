<?php
/**
 * Template Name: Create Network Map
 *
 * Create Network Map template.
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
                <h4 class="section-link"><a href=""><u>Network Map</u></a></h4>
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <p class="form-text">
                            <a href="Javascript:;" class="link mr-3">View Large</a>
                            <a href="Javascript:;" class="link"><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <input type="text" placeholder="Name Your Network Map" class="form-control creation_input">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle"></i> Me</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Contact</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Orgnization</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Position</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> How can they help?</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> How can I help?</li>
                    </ul>
                    <h5 class="m-0 mt-2">A Knomad creation</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="section-link mb-2"><a href="">Contact: 1</a></h4>
                </div>
                
                <div class="col-lg-7 col-md-7 col-sm-12 p-0">
                    <form method="post">
                        <div class="row m-0">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label><i class="fas fa-circle"></i> Name of Contact</label>
                                <input type="text" placeholder="First & Last Name" class="form-control creation_input">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label><i class="fas fa-circle"></i> Orgnization</label>
                                <input type="text" placeholder="Enter Orgnization" class="form-control creation_input">
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <label><i class="fas fa-circle"></i> Position</label>
                                <input type="text" placeholder="Enter Position" class="form-control creation_input">
                            </div>
                        </div>
                        <div class="mt-5 experience_row network_row">
                            <div class="experience_row_box">
                                <h5>How can they help me?</h5>
                                <div class="form-group d-flex align-items-center m-0">
                                    <i class="fas fa-circle"></i><input type="text" placeholder="Add Skills" class="form-control creation_input">
                                </div>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> What benifit can this person provide? [e.g referral, resume tips]</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> text</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="experience_row_box">
                                <h5>How can I help them? </h5>
                                <div class="form-group d-flex align-items-center m-0">
                                    <i class="fas fa-circle"></i>
                                    <input type="text" placeholder="Add tool/language/tech used as part of the skills" class="form-control creation_input">
                                </div>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> what benifit can you provide this person?</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> text</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0 mt-4 experience_row_box">
                            <div class="col-12">
                                <label>Notes</label>
                                <input type="text" placeholder="Type Here" class="form-control creation_input">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 d-flex align-items-center justify-content-center" style="height:300px">
                    <h5 class="text-center">
                        <i class="fas fa-circle d-block"></i>
                        <span class="d-block">jhon Doe</span> 
                    </h5>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 mt-5">
                    
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 mt-5">
                    <h4 class="section-link mb-2"><a href="javascript:;" class="d-flex align-items-center"><i class="fas fa-plus mr-2"></i> Contact 2:</a></h4>
                </div>
            </div>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
