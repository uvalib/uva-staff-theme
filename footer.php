<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uvalibrarystaff
 */

?>


	</div><!-- #content -->


 <footer class="page-footer orange darken-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Edit this website</h5>
          <p class="grey-text text-lighten-4">This website is run by Library Faculty &amp; Staff. If you need to post an announcement, add a page or edit content log in to the Wordpress Administration dashboard.</p>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin" class="btn-large waves-effect waves-light  blue darken-4"><i class="material-icons left"></i>Edit this website</a>
          <p class="grey-text text-lighten-4">Here is a list of handy Wordpress FAQs to help you if you get stuck. Otherwise, please <a class="white-text" href="">contact the UX Team</a> if you need help.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Sitemap</h5>
          <ul>
        <li><a class="white-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a class="white-text" href="<?php bloginfo('url'); ?>/our-organization">Our Organization</a></li>
        <li><a class="white-text" href="<?php bloginfo('url'); ?>/employee-resources">Employee Resources</a></li>
        <li><a class="white-text" href="<?php bloginfo('url'); ?>/data/">Library Data &amp; Statistics</a></li>
        <li><a class="white-text" ref="<?php bloginfo('url'); ?>/category/forms/">Forms</a></li>
        <li><a class="white-text" href="<?php bloginfo('url'); ?>/emergency-preparedness">Emergency Preparedness</a></li>
        <li><a class="white-text" href="<?php bloginfo('url'); ?>/about">About</a></li>

          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Helpful Links</h5>
          <ul>
            <li><a class="white-text" href="http://www.virginia.edu">U.Va. Home</a></li>
            <li><a class="white-text" href="http://hr.virginia.edu">U.Va. Human Resources</a></li>
            <li><a class="white-text" href="http://library.virginia.edu">U.Va. Library Home</a></li>
            <li><a class="white-text" href="http://www.library.virginia.edu/staff/">Staff Directory</a></li>
            <li><a class="white-text" href="https://e1prdw2.admin.virginia.edu:8090/OA_HTML/AppsLocalLogin.jsp">SSTL</a></li>
            <li><a class="white-text" href="https://benefits.sites.virginia.edu/Home">Benefits@U.Va.</a></li>
            <li><a class="white-text" href="https://portal3.sumtotalsystems.com/sites/100090/">Lead@U.Va.</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


            



<?php wp_footer(); ?>
</div>






</body>
</html>

