<?php
/**
 * Template Name: Signup Third
 *
 * Signup Third template.
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
                        <p class="form-text mb-1 text-white text-center">Optional question to help us create a better experience for you</p>
                        <p class="form-small-heading mb-4 text-white text-center">Please describe your current situation:</p>
                        <form action="https://beta.knomad.ai/signup-second/">
                            <div class="form-group">
                                <label class="d-flex align-items-center">
                                    <input type="radio" class="mr-2" name="radio">
                                    <span class="label-text flex-grow-1 text-white">I am a student</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center">
                                    <input type="radio" class="mr-2" name="radio">
                                    <span class="label-text flex-grow-1 text-white">I am a educator</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center">
                                    <input type="radio" class="mr-2" name="radio">
                                    <span class="label-text flex-grow-1 text-white">I'm in a workforce</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="d-flex align-items-center">
                                    <input type="radio" class="mr-2" name="radio">
                                    <span class="label-text flex-grow-1 text-white">Other - please describe</span>
                                </label>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-round m-auto">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #content -->
<?php get_footer(); ?>
