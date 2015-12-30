<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uvalibrarystaff
 */

get_header(); ?>

 <div class="container content">


    <div class="section">
 <div class="row">

      <div class="col l8 m12"> 
        <div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">



			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	</div><!-- #primary -->
		</div><!--end empty div (is this even needed?)-->

    </div><!--end col s8 -->

  <div class="col s12 m4" id="sideNav">
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
