<?php
/**
 * Template Name: Pricing
 *
 * Pricing template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />

	<!-- Content -->
	<div id="content" class="content" role="main" style="background:#f5f5f5">
        <div class="container py-5 px-0">
            <div class="row m-0 ">
                <div class="col-lg-10 col-md-10 m-auto p-0">
                    <div class="row m-0 pricing__table">
                        <div class="col-lg-4 col-md-4 col-sm-12 table__div">
                            <div class="table__box">
                                <h3 class="table__box__heading">Basic</h3>
                                <h4 class="table__box__price">$0.00<small>per month</small></h4>
                                <ul class="table__list">
                                    <li><i class="fas fa-circle mr-2"></i>Create unlimited visuals using preset templates</li>
                                    <li><i class="fas fa-circle mr-2"></i>See your content in a single overview [your brain]</li>
                                    <li><i class="fas fa-circle mr-2"></i>Share & embed creations with knomad branded colours & fonts</li>
                                </ul>
                                <div class="d-block text-center">
									<a href="https://beta.knomad.ai/membership-join/membership-registration/" ><button class="btn table__button" type="button">select</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 table__div">
                            <div class="table__box">
                                <h3 class="table__box__heading">Basic - but make it custom</h3>
                                <h4 class="table__box__price">$4.99<small>per month</small></h4>
                                <ul class="table__list">
                                    <li><i class="fas fa-circle mr-2"></i>Everything in basic plan</li>
                                    <li><i class="fas fa-circle mr-2"></i>Share & embed creations with knomad branded colours & fonts</li>
                                </ul>
                                <div class="d-block text-center">
                                    <!--<button class="btn table__button" type="button" style="margin-top:76px;">select</button>--><?php echo do_shortcode('[swpm_payment_button id=790 button_text="Select" class="btn table__button"]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 table__div">
                            <div class="table__box">
                                <h3 class="table__box__heading">premium</h3>
                                <h4 class="table__box__price">$12.99<small>per month</small></h4>
                                <ul class="table__list">
                                    <li><i class="fas fa-circle mr-2"></i>Everything in basic plan - but make it custom plan</li>
                                    <li><i class="fas fa-circle mr-2"></i>Create custom templates & visual relationships</li>
                                    <li><i class="fas fa-circle mr-2"></i>Drag, Drop & Combine creations to create custom brains</li>
                                </ul>
                                <div class="d-block text-center">
                                    <button class="btn table__button">coming soon!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <!-- #content -->
<?php get_footer(); ?>
