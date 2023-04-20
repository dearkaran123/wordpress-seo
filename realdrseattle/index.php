<?php 
	get_header(); 
	while ( have_posts() ) :
	the_post();
 ?>
<section class="section-two">
    <div class="row">
	    <div class="col-md-12 form-s2">
	        <h1 class="section-2-head pb-3 me-5 pe-5 fs-1"><?php the_title(); ?></h1>
	        <div class="items-list">
	           <?php the_content(); ?>
	        </div>
		</div>
	</div>
</section>
	
<?php endwhile; get_footer(); ?>