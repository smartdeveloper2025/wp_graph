<?php
/**
 * Template Name: Landing Page
 *
 * Landing Page template.
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
        <section class="landing-section">
            <div class="container">
                <div class="row mx-0 align-items-center">
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <img src="http://beta.knomad.ai/wp-content/uploads/2021/09/gg.jpg" width="50%">  
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-box">
                            <h3 class="mb-4 text-white text-uppercase landing-page-heading text-center">knomad</h3>
                            <form action="https://beta.knomad.ai/signup-second/">
                                <div class="form-group">
                                    <h4 class="text-white text-center landing-small-heading">One platform for visualising experiences, learnings, and life.</h4>
                                </div>
                                <h3 class="mb-4 text-white text-uppercase landing-page-heading text-center">sign-up</h3>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Enter email" id="email">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-round m-auto">Let's Go!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p style="text-align: center;margin:80px 0px;"><i class="fas fa-chevron-down" style="font-size: 18px;"></i></p>
                        <p class="text-center">Learning in the 21st century goes beyond the classroom. <br>Apply your learning to life, and create learnings out of life.</p>
                    </div>
                </div>  
            </div>
        </section>
        <section class="section">
            <div class="container">
                <div class="row m-0 align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="font-weight-bold">Easy and intuitive creation. Do what you're used to and we'll do the tough stuff for you.</label>
                        <p>Easly create visuals of your learnings for key scereats.</p>
                        <ul>
                            <li>topic notes</li>
                            <li>work/life experience</li>
                            <li>rework & work mapping</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <textarea type="text" class="form-control" style="height:300px;"></textarea>
                    </div>
                </div>
                <div class="row m-0 align-items-center mt-5">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="font-weight-bold">Share what you know, without the lengthy paragraphs and text.</label>
                        <p>Embed on your blog or site to share a beautiful, connected, and interactive experience of your life.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <textarea type="text" class="form-control" style="height:300px;"></textarea>
                    </div>
                </div>
                <div class="row m-0 align-items-center mt-5">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="mb-5 font-weight-bold">See how different areas of your life come together.</label>
                        <p class="mb-4">We're on a mission to create a platform for lifetime learning: a place where it all coms together without having to pour over pages of notes and memories.</p>
                        <p>People create information and relationships everday. and our technology should bring it all together for us.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <textarea type="text" class="form-control" style="height:300px;"></textarea>
                    </div>
                </div>
            </div>
        </section>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
