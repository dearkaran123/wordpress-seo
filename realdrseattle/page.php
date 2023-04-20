<?php 
    get_header(); 
	while ( have_posts() ) :
	the_post();
 ?>

<div class="section-two container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <h2><?php echo get_the_title();?></h2>
                    <div class="body-content">
                        <?php echo get_the_content();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
<?php 
    endwhile;
    get_footer();
?>