<?php
/**
 * Template Name: View Network Map
 *
 * View Network Map template.
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
            <div class="row mx-0">
                <div class="col-12 p-0">
                    <div class="d-flex ">
                        <p class="font-weight-bold"><u>My Professional Network</u></p>
                        <p class="form-text ml-3">
                            <a href="Javascript:;" class="link mr-3">Edit</a>
                            <a href="Javascript:;" class="link"><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle"></i> Contacts</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Orgnisation</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> Position</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> How can they help?</li>
                        <li class="nav-item px-1"><i class="fas fa-circle"></i> How can I help?</li>
                    </ul>
                    <h5 class="m-0 mt-2">A Knomad creation</h5>
                </div>
                <div class="col-12 p-0">
                    <div class="row mx-0 mt-5">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/dot-png.png">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
