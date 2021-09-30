<?php
/**
 * Template Name: Refferal
 *
 * Refferal template.
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
            <div class="row mt-5">
                <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12 m-auto">
                    <div class="form-box">
                        <p class="form-small-heading mb-4 text-white text-center">Refer freiends and colour your world!</p>
                        <p class="form-text mb-1 text-white text-center">When they sign-up and sign into knomad you will climb higher in the wailist for the beta of upcoming template and our premium offering. </p>
                        <form action="" method="post" class="reffral__form mt-4">
                            <div class="form-group d-flex">
                                <input type="email" class="form-control mr-3" placeholder="E-mail" name="email1">
                                <button type="submit" class="btn btn-round m-auto">Send</button>
                            </div>
                        </form>
                        <form action="" method="post" class="reffral__form mt-4">
                            <div class="form-group d-flex">
                                <input type="email" class="form-control mr-3" placeholder="E-mail" name="email1">
                                <button type="submit" class="btn btn-round m-auto">Send</button>
                            </div>
                        </form>
                        <form action="" method="post" class="reffral__form mt-4">
                            <div class="form-group d-flex">
                                <input type="email" class="form-control mr-3" placeholder="E-mail" name="email1">
                                <button type="submit" class="btn btn-round m-auto">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <p class="m-0 mt-5 text-center">Share your referral link to social media</p>
                    <ul class="nav social__links justify-content-center mt-4">
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.facebook.com/knomadai/" target="_blank"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li class="nav-item mr-4 ml-4">
                            <a class="nav-link" href="https://twitter.com/KnomadAi" target="_blank"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.linkedin.com/company/knomad-ai" target="_blank"><i class="fas fa-link"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
