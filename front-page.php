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
          <h3>Integrity</h3>
          <h5 class="light grey-text text-lighten-3">Being honest, open, fair, and trustworthy.</h5>

      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff_3.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Respect</h3>
          <h5 class="light grey-text text-lighten-3">Recognizing the dignity of everyone in the organization.</h5>

        </div>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff_4.png"> <!-- random image -->
        <div class="caption center-align">
          <h3>Collaboration</h3>
          <h5 class="light grey-text text-lighten-3">Seeking out and appreciating all perspectives and contributions.</h5>

        </div>
      </li>
        <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff_5.png"> <!-- random image -->
        <div class="caption left-align">
          <h3>Innovation</h3>
          <h5 class="light grey-text text-lighten-3">Challenging the status quo and rewarding responsible risk taking.</h5>
        </div>
      </li>
    </ul>


</div>


   <div class="container">


    <div class="section">
 <div class="row">

        <div class="col s4"> 

          <div class="card  grey lighten-2">
<form method="get" action="http://www.library.virginia.edu/staff/">
            <div class="card-content black-text">
              <span class="card-title activator black-text">Staff Directory<i class="material-icons right">more_vert</i></span></span>
          <ul>
            <li>
              <h6>Search the Directory</a>
              <input placeholder="Name" id="first_name" name="search" type="text" class="validate">
            </li>

          </ul>
            </div>
            <div class="card-action">
            <button class="btn-large waves-effect waves-light orange darken-1" type="submit" name="action">Search</button>

            </div>
</form>
                <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Staff by Area<i class="material-icons right">close</i></span>
      <ul>
        <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">All Staff</a></li>
        <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Administration &amp; Planning Staff</a></li>
        <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Library Experience Staff</a></li>
        <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Academic Engagement Staff</a></li>
        <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Collections, Access &amp; Discovery Staff</a></li>
          <li><a href="#" title="Posted 2 June 2015 | 3:35 pm">Office of the University Librarian</a></li>
      </ul>
    </div>

          </div>




        </div>



         <div class="col s8"> 
        <div class="icon-block">

<h5 class="center">Library News &amp; Updates</h5>
<div class="newsColumns">




<table class="bordered striped hoverable">

        <tbody>
          <tr>
            <td><a href="http://leadership.library.virginia.edu/2015/06/02/slt-meeting-notes-june-2-2015/" title="Posted 2 June 2015 | 3:35 pm">SLT Meeting Notes–June 2, 2015</a></td>
          </tr>
          <tr>
            <td>                <a href="http://leadership.library.virginia.edu/2015/06/02/slt-meeting-notes-june-2-2015/" title="Posted 2 June 2015 | 3:35 pm">
                    SLT Meeting Notes–June 2, 2015              </a></td>
          </tr>
          <tr>
            <td><a href="http://leadership.library.virginia.edu/2015/06/01/alderman-renewal-update/" title="Posted 1 June 2015 | 9:55 am">
                    Alderman renewal update            </a></td>
          </tr>
          <tr>
            <td>                <h6><a href="http://leadership.library.virginia.edu/2015/05/26/slt-meeting-notes-may-19-2015/" title="Posted 26 May 2015 | 5:15 pm">
                    SLT Meeting Notes – May 19, 2015                </a></h6> </td>
          </tr>
          <tr>
            <td>                <h6><a href="http://leadership.library.virginia.edu/2015/05/26/slt-meeting-notes-may-12-2015/" title="Posted 26 May 2015 | 4:46 pm">
                    SLT Meeting Notes – May 12, 2015                </a></h6> </td>
          </tr>
          <tr>
            <td><a href=""><h6>Resources for Managers and Supervisors</h6></a></td>
          </tr>
          <tr>
            <td><a href=""><h6>2015 Library User Survey results and presentation documents are now available.</h6></a></td>
          </tr>
          <tr>
            <td><a href=""><h6>Notes from Rebecca Graham at ELT, June 9 2015</h6></a>
          </tr>
        </tbody>
      </table>



</div>

<a class="btn-large waves-effect waves-light orange darken-1 right" href="<?php echo esc_url( home_url( '/' ) ); ?>news">Read all news &amp; updates</a>


          </div>
        </div>



    </div><!--end row-->




        </div><!--end section-->


  </div>




  <div class="container">
    <div class="section">
 
 <div class="row">




      <div class="col s4">
       <div class="icon-block">
            <h5 class="center">Learning Calendar and Staff Events</h5>
<!--<?php $category_id = get_cat_id('Staff Events'); echo $category_id ?>-->

                <ul>       <?php query_posts('cat=140,141&showposts=5'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <li><a href="<?php the_permalink() ?>"><h6><?php the_title(); ?></h6></a>
    <p class="light truncate"><?php the_excerpt() ?></p>
    <a class="right-align" href="">Read more »</a></li>
  </li>
<?php endwhile; endif; ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>/blog/category/staff-events/" class="btn-large waves-effect waves-light orange darken-1">View more Staff events</a>

          </div>
        </div>




      <div class="col s4">
       <div class="icon-block" id="recentUpdates">

        <?php
     $today = current_time('mysql', 1);
     $howMany = 5;

     if ( $recentposts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_modified_gmt < '$today' ORDER BY post_modified_gmt DESC LIMIT $howMany")):
?>
<h5 class="center"><?php _e("Activity</h5>"); ?></h5>
<h6><?php _e("Recently Updated Pages</h5>"); ?></h6>
<ul>
<?php
foreach ($recentposts as $post) {
     if ($post->post_title == '') $post->post_title = sprintf(__('Post #%s'), $post->ID);
     echo "<li><a href='".get_permalink($post->ID)."'>";
     the_title();
     echo '</a></li>';
          echo "<li><a href='".get_permalink($post->ID)."'>";
        the_author();
     echo '</a></li>';
}
?>
</ul>
<?php endif; ?>


          </div>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin" class="btn-large waves-effect waves-light orange darken-1">Login to the Wordpress Dashboard</a>
        </div>


 <div class="col m12 l4">
       <div class="icon-block">


          <h5 class="center">Library Social Media Feeds</h5>

<?php include_once(ABSPATH.WPINC.'/rss.php');
$feed = fetch_rss('http://static.lib.virginia.edu/feeds/staffSocial.xml');
$items = array_slice($feed->items, 0, 10);

foreach ($items as $item):
?>
<h6><a href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a></h6>
<p><?php echo $item['description']; ?></p>
<?php endforeach; ?>

          </div>
        </div>




    </main><!-- #main -->
  </div><!-- #primary -->

    <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="<?php bloginfo('template_directory'); ?>/images/staff-1.png">" /></div>
  </div>


<?php get_footer(); ?>
  








