<?php
/*
Template Name: front-page
 */

get_header(); ?>

<!--<div id="content" class="site-content">-->

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff_15.png"> <!-- random image -->
          <div class="caption center-align" id="title1">
            <h3>Diversity &amp; Inclusion</h3>
            <h5 class="light grey-text text-lighten-3">Encouraging and celebrating our differences.</h5>
          </div>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff_16.png"> <!-- random image -->
          <div class="caption left-align" id="title2">
            <h3>Innovation</h3>
            <h5 class="light grey-text text-lighten-3">Challenging the status quo and rewarding responsible risk taking.</h5>
          </div>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff-2.png"> <!-- random image -->
          <div class="caption left-align" id="title3">
              <h3>Integrity</h3>
            <h5 class="light grey-text text-lighten-3">Being honest, open, fair, and trustworthy.</h5>
          </div>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff_5.png"> <!-- random image -->
          <div class="caption center-align" id="title4">
            <h3>Collaboration</h3>
            <h5 class="light grey-text text-lighten-3">Seeking out and appreciating all perspectives and contributions.</h5>
          </div>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff_starburst.png"> <!-- random image -->
          <div class="caption left-align" id="title5">
            <h3>Respect</h3>
            <h5 class="light grey-text text-lighten-3">Recognizing the dignity of everyone in the organization.</h5>

          </div>
        </li>
      </ul>
    </div>

    <div class="container">
      <div class="section">
        <div class="row">
            <div class="col m12 l4">
              <div class="card  grey lighten-2">
                <div class="card-image">
                  <img src="<?php bloginfo('template_directory'); ?>/images/staff_3.png">
                  <span class="card-title activator black-text">Staff Directory<!--<i class="material-icons right">more_vert</i>--></span>
                </div>
                <form method="get" action="http://www.library.virginia.edu/staff/">
                  <div class="card-content black-text">
                    <ul>
                      <li>
                        <h6>Search the Directory</a>
                        <input placeholder="Name" id="first_name" name="search" type="text" class="validate">
                      </li>
                    </ul>
                  </div>
                  <div class="card-action">
                    <button class="btn-large waves-effect waves-light center-align blue darken-4" type="submit" name="action">Search</button>
                  </div>
                </form>
                <!--<div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">Staff by Area<i class="material-icons right">close</i></span>
                  <ul>
                    <li><a href="#" title="All Staff">All Staff</a></li>
                    <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Administration &amp; Planning Staff</a></li>
                    <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Content Stewardship</a></li>
                    <li><a href="http://www.library.virginia.edu/staff/#!/libteam-ux" title="Posted 2 June 2015 | 3:35 pm">Library Experience Staff</a></li>
                    <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Academic Engagement Staff</a></li>
                    <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Collections, Access &amp; Discovery Staff</a></li>
                    <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Office of the University Librarian</a></li>
                  </ul>
                </div>-->
              </div>
            </div>

            <div class="col m12 l4">
              <div class="icon-block">
                <h5><a href="<?php echo esc_url(home_url('/')); ?>news"">Library News &amp; Updates</a></h5>
              
              <ul class="collection">
                <?php
                $args=array(
                   'posts_per_page'=>5,
                   'post_type' => 'post',
                );
                $my_query = new WP_Query($args);
                if( $my_query->have_posts() ) {
                  while ($my_query->have_posts()) : $my_query->the_post(); ?>
                  <a href="<?php the_permalink() ?>" class="collection-item"><?php the_title(); ?> <?php the_time('d.m.y') ?></a>
                  <?php
                endwhile;
                }
                ?>
              </ul>
              <a class="btn-large waves-effect waves-light center-align blue darken-4" href="<?php echo esc_url(home_url('/')); ?>news">Read all news &amp; updates</a>
            </div>
            </div>

            <div class="col m12 l4">
              <div class="icon-block">
                <h5><a href="http://leadership.library.virginia.edu">Library Leadership Blog</a></h5>
              
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
              <a class="btn-large waves-effect waves-light center-align blue darken-4" href="http://leadership.library.virginia.edu">Read More</a>

            </div>
            </div>

          </div><!--end row-->
        </div><!--end section-->
      </div>

  <div class="container">
    <div class="section">
      <div class="row">



        <div class="col m12 l4">
          <div class="icon-block" id="recentUpdates">
            <h5 class="center"><?php _e('Activity Feed</h5>'); ?></h5>
            <h6><?php _e('Recently Published Pages</h5>'); ?></h6>
            <?php
            $args=array(
               'posts_per_page'=>6,
               'post_type' => 'page',
            );
            $my_query = new WP_Query($args);
            if( $my_query->have_posts() ) {
              while ($my_query->have_posts()) : $my_query->the_post(); ?>
                <p><small><?php the_time('d.m.y') ?></small> <a href="<?php the_permalink() ?>" rel="bookmark" title="Odkaz na <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                <?php
              endwhile;
            }
            ?>
          </div>
          <a href="<?php echo esc_url(home_url('/')); ?>wp-admin" class="btn-large waves-effect waves-light  blue darken-4">Login to the Wordpress Dashboard</a>
        </div>



        <div class="col m12 l4">
          <div class="icon-block">
            <h5 class="center">Learning Calendar and Staff Events</h5>
            <!--<?php $category_id = get_cat_id('Staff Events'); echo $category_id ?>-->
            <ul class="collection">
              <?php query_posts('cat=92,93&showposts=5'); ?>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <li><a href="<?php the_permalink() ?>"><h6><?php the_title(); ?></h6></a>
                <p class="light truncate"><?php the_excerpt() ?></p>
                <a class="right-align" href="<?php the_permalink() ?>">Read more »</a>
              </li>
              <?php endwhile; endif; ?>
            </ul>
                          <a href="<?php echo esc_url(home_url('/')); ?>staff-events-and-learning-calendar" class="btn-large waves-effect waves-light  blue darken-4">View more Staff events</a>

          </div>
        </div>




        <div class="col m12 l4">
          <div class="icon-block">
            <h5 class="center">Library Social Media Feeds</h5>
            <?php include_once ABSPATH.WPINC.'/rss.php';
            define('MAGPIE_CACHE_ON', false);
            $feed = fetch_rss('http://static.lib.virginia.edu/feeds/staffSocial.xml');
            $items = array_slice($feed->items, 0, 5);
            foreach ($items as $item):
            ?>
            <div id="<?php echo $item['guid']; ?>" class="<?php echo $item['source']; ?>">
            <h6><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h6>
            <p><?php echo $item['description']; ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<!-- 
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php bloginfo('template_directory'); ?>/images/staff-1.png">" /></div>
  </div> -->

  <?php get_footer(); ?>
