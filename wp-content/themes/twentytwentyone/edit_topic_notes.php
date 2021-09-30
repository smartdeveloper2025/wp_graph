<?php
/**
 * Template Name: Edit Topic Notes
 *
 * Edit Topic Notes template.
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
                <h4 class="section-link"><a href=""><u>Topic Notes</u></a></h4>
                <div class="col-12 p-0">
                    <div class="d-flex justify-content-between">
                        <p class="font-weight-bold"><i class="fas fa-circle"></i> ANTH1001</p>
                        <p class="form-text">
                            <a href="Javascript:;" class="link mr-3">View Large</a>
                            <a href="Javascript:;" class="link"><i class="fas fa-link mr-2"></i>Share</a>
                        </p>
                    </div>
                </div>
            </div>
            <form method="post">
                <div class="row mb-5">
                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <input type="text" placeholder="Description" class="form-control creation_input">
                        <p class="form-text">[you can use this to describe the purpose of this creation]</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <h5 class="m-0 mt-2">A Knomad creation</h5>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 mt-5">
                        <h4 class="section-link mb-2"><a href=""><u>Sub-Topic: 1</u></a></h4>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 p-0">
                        <div class="row m-0">
                            <div class="col-12">
                                <label><i class="fas fa-circle"></i> Name of Sub-Topic</label>
                                <p class="form-text pl-3">TOUR1001- Tourism & anthroplogy</p>
                            </div>
                        </div>
                        <div class="mt-5 experience_row">
                            <div class="experience_row_box">
                                <h5 class="m-0">Source material/location [you can use this to group the keyword]?</h5>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> Case study: Tourism in Hoi Ann</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="experience_row_box">
                                <h5 class="m-0"></h5>
                                <div class="form-group pt-0 m-0">
                                    <ul class="nav flex-column creation_list">
                                        <li class="nav-item"><i class="fas fa-circle"></i> <u>Globalisation Tourism</u></li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
                                        <li class="nav-item"><i class="fas fa-circle"></i> --</li>
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
                    </div>  
                </div>
            </form>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 mt-5">
                    <h4 class="section-link mb-2"><a href="javascript:;" class="d-flex align-items-center"><i class="fas fa-plus mr-2"></i> Sub-Topis 2:</a></h4>
                </div>
            </div>
        </div>
        
	</div>
    <!-- #content -->
<?php get_footer(); ?>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
