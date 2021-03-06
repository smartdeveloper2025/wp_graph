<?php
/**
 * Template Name: Logout
 *
 * Logout template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<style>
    body{
        background: #f2eff7 !important;
    }
</style>

	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5 px-0">
            <div class="row m-0">
                <div class="col-lg-8">
                    <div class="circle-box">
                        <h2 class="circle-heading">Neque Porron Ipsum<br>Quisquam</h2>
                        <a href="https://beta.knomad.ai/contact-us/" class="btn-round">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-box">
                        
                        <p class="form-small-heading mb-4 text-white text-center">You have been logged out!</p>
                        <h3 class="mb-4 form-heading text-white text-uppercase text-center">log back in</h3>
                        <form action="https://beta.knomad.ai/signup-second/">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter email" id="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Create password" id="password-one" autocomplete="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" id="password-two" autocomplete="">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-round m-auto">Submit</button>
                            </div>
                            <p class="text-center text-white form-text">By signing up you agree to Knomad???s <a href="https://beta.knomad.ai/term-conditions/" class="login-signup-link">Term's & Condition's</a> and <a href="https://beta.knomad.ai/privacy-policy/" class="login-signup-link">Privacy Policy</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
