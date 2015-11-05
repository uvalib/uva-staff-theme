<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uvalibrarystaff
 */

get_header(); ?>

 <div class="container content">


    <div class="section">
 <div class="row">

      <div class="col s8"> 
        <div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">





		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
			<a href="?php query_posts('category=category-slug-name'); ?>">CLick here to show the events</a>
						<?php next_posts_link('Older Posts'); ?>
<?php previous_posts_link('Newer Posts'); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>



		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		</div><!--end empty div (is this even needed?)-->

    </div><!--end col s8 -->
		    			<?php get_sidebar(); ?>
  </div>
  </div>
</div>



<?php get_footer(); ?>
