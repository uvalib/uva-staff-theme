<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uvalibrarystaff
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


 <div class="container content">


 <div class="section">
 <div class="row">

      <div class="col s8"> 
        <div>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</div>
    </div>
      <div class="col s4" id="sideNav">
    			<?php get_sidebar(); ?>
    	</div>
  </div>
  </div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
