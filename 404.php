<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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


			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'uvalibrarystaff' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'uvalibrarystaff' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( uvalibrarystaff_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'uvalibrarystaff' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'uvalibrarystaff' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</main><!-- #main -->
	</div><!-- #primary -->
		</div><!--end empty div (is this even needed?)-->

    </div><!--end col s8 -->

  <div class="col s4" id="sideNav">
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
