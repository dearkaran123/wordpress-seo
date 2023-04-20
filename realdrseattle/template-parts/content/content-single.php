<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<div class="section-two container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						
						<div class="entry-content">
							<?php
							the_content();

							?>
						</div><!-- .entry-content -->


					</div><!-- #post-<?php the_ID(); ?> -->

                </div>
            </div>
        </div>
    </div>
</div>
	