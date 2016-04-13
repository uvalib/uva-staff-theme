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

      <div class="col s12 m8"> 
        <div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>



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
				


<!-- do I need this><?php next_posts_link('Older Posts'); ?>
<?php previous_posts_link('Newer Posts'); ?>-->

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>



		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		</div><!--end empty div (is this even needed?)-->

    </div><!--end col s8 -->

  <div class="col m12 l4" id="sideNav">
		    			<?php get_sidebar(); ?>



<!-- Here is the code to pull in the Library Leadership Notes items on the current Staff website home page - Starrie -->

<div class="widget widget_leadershipBlog">
 <h2 class="widgettitle"><a href="http://leadership.library.virginia.edu">Library Leadership Blog</a></h2>
                <?php
                wprss_display_feed_items( $args = array(
                    'links_before' => '<ul class="collection">',
                    'links_after' => '</ul>',
                    'link_before' => '<li class="collection-item">',
                    'link_after' => '</li>',
                    'limit' => '3',
                    'source' => '8170'
                    ));
                ?>


              <a class="btn-large waves-effect waves-light orange darken-1" href="http://leadership.library.virginia.edu">Read More</a>


            </div>





		    			<?php the_widget( 'WP_Widget_Categories', $instance, $args ); ?> 
		    			<?php the_widget( 'WP_Widget_Tag_Cloud', $instance, $args ); ?> 
		    			<?php the_widget( 'WP_Widget_Archives', $instance, $args ); ?> 

		    		</div>
		    			
  </div>
  </div>
</div>



<?php get_footer(); ?>
