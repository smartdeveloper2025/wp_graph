<?php
/**
 * Template Name: Settings
 *
 * Settings template.
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
<style type="text/css">
    .experience_row_box {
        display: grid;
        grid-template-rows: 85px;
    }
</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5">
            <div class="row mx-0">
                <h4 class="section-link font-weight-bold"><a href="">Your Account</a></h4>
            </div>
            <form method="post">
                <div class="col-12 p-0">
                    <div class="row mb-3">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>First Name:</label>
                            <input type="text" placeholder="First Name" class="form-control creation_input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>Last Name:</label>
                            <input type="text" placeholder="Last Name" class="form-control creation_input">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <label>My Current Situation</label>
                            <select class="form-control creation_input">
                                <option value="">Select Situation</option>
                                <option value="1">I am a Student</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12">
                            <label class="font-weight-bold">Authentication</label>
                            <p class="form-text m-0">Manage how you log in to your account </p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <label>E-Mail:</label>
                            <p class="form-text m-0">We'll send you an email confirmation if you update your email</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="email" placeholder="E-Mail" class="form-control creation_input">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <label>New Password:</label>
                            <p class="form-text m-0">Must contain at least 6 charcters, 1 uppercase letter, 1 number and symbol</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="password" placeholder="New Password" class="form-control creation_input">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <label>Confirm Password:</label>
                            <p class="form-text m-0">Re-enter your new password for verification</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <input type="password" placeholder="Confirm Password" class="form-control creation_input">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <label class="font-weight-bold">Email Preferences</label>
                            <p class="form-text m-0">Receive emails including new features and product updates from us</p>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 toggle_switch text-right">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row mb-4 mx-0">
                        <label class="font-weight-bold col-12 p-0">Billing</label>
                        <div class="col-lg-5 col-md-5 col-sm-12 card_info">
                            <div>
                                <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/smart_earn.png">
                            </div>
                            <label class="font-weight-bold">
                                American Express
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                 1003
                            </label>
                            <p class="form-text">Expires January 2028</p>
                            <button class="btn btn-light" type="button">Change</button>
                        </div>
                    </div>
                    <div class="row mb-4 mx-0">
                        <div class="col-lg-5 col-md-5 col-sm-12 p-0">
                            <div class="row m-0">
                                <div class="col-6">
                                    <p class="m-0 form-text">Change Subscription</p>
                                </div>
                                <div class="col-6">
                                    <p class="m-0 form-text">Change Subscription</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
