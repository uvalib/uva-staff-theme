<?php
/**
 * Template Name: Category Page
 *
 * A custom page template using custom field or Page Name = Category Name .
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 */
get_header(); ?>

 <div class="container content">


    <div class="section">
 <div class="row">

      <div class="col l8 m12"> 
        <div>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section>
				<?php the_title( '<h1 class="section-title">', '</h1>' ); ?>
								
				<?php 
					/* Lets see if we have a category to display */
					global $post;
					
					// Save our page posts to use later
					$tmp_post = $post;
					$catids[] = array();
					
					// Do we have categories set on the custom fields
					$meta_cats = get_post_meta($post->ID, 'categories', true);
					
					// Do we have an order set on the custom fields
					$asc = get_post_meta($post->ID, 'asc', true);
										
					// Do not rely on what the admin entered 
					$order = $asc ? 'ASC' : 'DESC';
					if( $meta_cats ) {
						$categories = explode(',', $meta_cats);
						foreach ($categories as $meta_cat) {
							// If we have a meta value is it numeric or a slug, return an id
							$catids[] = is_numeric( $meta_cat ) ? $meta_cat : get_cat_ID($meta_cat);
						}
					}
					
					// No category ID so use the page slug to find a category
					if( count($catids) == 0 ) {
						$catid = get_cat_ID($post->post_name);   
						if( $catid && is_numeric( $catid ) ) $catids[] = $catid;
					}
					
					// If we have a category id we can get the category posts
					if( count($catids) != 0 ) {
						$do_not_show_stickies = 1; // 0 to show stickies
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
						$args = array( 
							'cat' => array(140, 141),
							'post_type' => array('post'),
							'order' => $order,
							'ignore_sticky_posts' => $do_not_show_stickies
						);
						
						$wp_query= null;
						$wp_query = new WP_Query();
						$wp_query->query( $args );
							
						// Output our Query
						if ( $wp_query->have_posts() ) {
							while ( $wp_query->have_posts() ) {
								$wp_query->the_post();
								get_template_part( 'template-parts/content', 'page' );
							}
						}
					}	
				?>
				
				<?php 
					// Reset the post to the page post
					$post = $tmp_post; 
				?>
				
				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
			</section>
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