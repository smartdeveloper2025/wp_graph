<?php
/**
 * Template Name: Deleted Creations
 *
 * Deleted Creations template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */


get_header();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/template-style.css" type="text/css" />
<style type="text/css">
    .creation-row{
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 20px;
    }
</style>
	<!-- Content -->
	<div id="content" class="content" role="main">
        <div class="container py-5 px-0">
            <div class="row m-0">
                <div class="col-lg-3 col-md-3 col-sm-12">
                     <h4 class="section-link"><a href=""><u>Deleted Creations</u></a></h4>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <ul class="nav list_itms">
                        <li class="nav-item pr-1"><i class="fas fa-circle" aria-hidden="true"></i> Deleted items will be permanently removed after 30 days.</li>
                    </ul>
                </div>
            </div>
            <div class="row m-0 mt-4">
                <div class="col-lg-3 col-md-3 d-none d-lg-block d-md-block"></div>      
                <div class="col-lg-9 col-md-9 col-sm-12 creation-row">
                    <div class="mycreation-box">
                        <i class="fas fa-ellipsis-v creaton-dot"></i>
                        <h4 class="creation-heading m-0">SH resume</h4>
                        <p class="creation-info m-0">Last edit: 2 mints ago</p>
                    </div>
                </div>      
            </div>
        </div>
	</div>
    <div class="modal deleted__modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-between">
                    <div class="mycreation-box" style="width:200px;">
                        <i class="fas fa-ellipsis-v creaton-dot"></i>
                        <h4 class="creation-heading m-0">SH resume</h4>
                        <p class="creation-info m-0">Last edit: 2 mints ago</p>
                    </div>
                    <button type="button" class="btn deleted__reset">Restore</button>
                </div>
            </div>
        </div>
    </div>
    <!-- #content -->
<?php get_footer(); ?>
<script>
    var modal = document.getElementById("myModal");
    var btn = document.querySelector(".creaton-dot");
    btn.onclick = function() {
        modal.style.display = "block";
    }

    window.onclick = function(event) {
        if(event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
