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
				


<!-- do I need this><?php next_posts_link('Older Posts'); ?>
<?php previous_posts_link('Newer Posts'); ?>-->

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>



		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
		</div><!--end empty div (is this even needed?)-->

    </div><!--end col s8 -->

  <div class="col s4" id="sideNav">
		    			<?php get_sidebar(); ?>



<!-- Here is the code to pull in the Library Leadership Notes items on the current Staff website home page - Starrie -->

<?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );
// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'http://leadership.library.virginia.edu/feed/' );
if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly
    // Figure out how many total items there are, but limit it to 5.
    $maxitems = $rss->get_item_quantity( 5 );
    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );
endif;
?>
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>





		    			<?php the_widget( 'WP_Widget_Categories', $instance, $args ); ?> 
		    			<?php the_widget( 'WP_Widget_Tag_Cloud', $instance, $args ); ?> 
		    			<?php the_widget( 'WP_Widget_Archives', $instance, $args ); ?> 

		    		</div>
		    			
  </div>
  </div>
</div>



<?php get_footer(); ?>
