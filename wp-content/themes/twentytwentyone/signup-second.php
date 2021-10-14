<?php

/**

 * Template Name: Signup Second

 *

 * Signup Second template.

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
    form#swpm-editprofile-form table tr {
        margin-bottom: 15px;
        display: block;
    }
    form#swpm-editprofile-form table tr td {
        min-width: 100%;
        display: block;
        padding: 0px;
        border: 0px;
    }
    form#swpm-editprofile-form table tr td label {
        color: #fff;
        margin-bottom: 10px;
        display: block;
        font-weight: 400;
    }
    form#swpm-editprofile-form .swpm-profile-country-row select{
        border: none;
        border-radius: 10px;
    }
    form#swpm-editprofile-form input.swpm-edit-profile-submit {
        padding: 5px 30px;
        border-radius: 30px;
        background: #fff !important;
        color: #593e97 !important;
        font-weight: 500;
        height: 45px;
        width: 100%;
    }

</style>

	<!-- Content -->

	<div id="content" class="content" role="main">

        <div class="container py-5 px-0">

            <div class="row m-0">

                <div class="col-lg-8">

                    <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/connect-dots.png" width="100%">

                </div>

                <div class="col-lg-4">

                    <div class="form-box">

                        <p class="form-small-heading mb-1 text-white text-center">You have signed up! yay!</p>

                        <p class="form-small-heading mb-4 text-white text-center">To assist us with setting your profile please provide:</p>

						<?php echo do_shortcode('[swpm_profile_form]'); ?>

                        <!--<form action="https://beta.knomad.ai/signup-third/">

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="First Name" id="first-name">

                            </div>

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Last Name" id="last-name">

                            </div>

                            <p class="text-center text-white form-text">Your first name & last name will be used to show your involvement in your creations.<br> E.g First Name <a href="Javascript:;" class="login-signup-link"><u>Jhon</u></a> & <a href="Javascript:;" class="login-signup-link"><u>Doe</u></a></p>

                            <p class="text-center text-white form-text">Create a username for your lifelong account of Lifelong Learning</p>

                            <div class="form-group">

                                <input type="text" class="form-control" placeholder="Username" id="username">

                            </div>

                            <div class="form-group text-center">

                                <button type="submit" class="btn btn-round m-auto">Continue</button>

                            </div>

                        </form>-->

                    </div>

                </div>

            </div>

        </div>

	</div>

    <!-- #content -->

<?php get_footer(); ?>

