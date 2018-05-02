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


 <footer class="page-footer grey lighten-3">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5>Edit this website</h5>
          <p>This website is run by Library Faculty &amp; Staff. If you need to post an announcement, add a page or edit content log in to the Wordpress Administration dashboard.</p>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin" class="btn-large waves-effect waves-light  blue darken-4"><i class="material-icons left"></i>Edit this website</a>
          <p>Here is a <a href="<?php bloginfo('url'); ?>/faqs-for-editing-staff-website/">list of handy Wordpress FAQs</a> to help you if you get stuck. Otherwise, please <a href="mailto:libx-ux@virginia.edu">contact the UX Team</a> if you need help.</p>


        </div>
        <div class="col l3 s12">
          <h5>Sitemap</h5>
          <ul>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php bloginfo('url'); ?>/our-organization">Our Organization</a></li>
        <li><a href="<?php bloginfo('url'); ?>/employee-resources">Employee Resources</a></li>
        <li><a href="<?php bloginfo('url'); ?>/library-data-statistics/">Library Data &amp; Statistics</a></li>
        <li><a href="<?php bloginfo('url'); ?>/all-forms">Forms</a></li>
        <li><a href="<?php bloginfo('url'); ?>/emergency-preparedness">Emergency Preparedness</a></li>
        <li><a href="<?php bloginfo('url'); ?>/about">About</a></li>

          </ul>
        </div>
        <div class="col l3 s12">
          <h5>Helpful Links</h5>
          <ul>
            <li><a href="https://www.virginia.edu">U.Va. Home</a></li>
            <li><a href="https://hr.virginia.edu">U.Va. Human Resources</a></li>
            <li><a href="https://library.virginia.edu">U.Va. Library Home</a></li>
            <li><a href="https://www.library.virginia.edu/staff/">Staff Directory</a></li>
            <li><a href="https://is.admin.virginia.edu/OA_HTML/OA.jsp?OAFunc=OAHOMEPAGE">SSTL</a></li>
            <li><a href="https://benefits.sites.virginia.edu/Home">Benefits@U.Va.</a></li>
            <li><a href="https://portal3.sumtotalsystems.com/sites/100090/">Lead@U.Va.</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="https://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>

<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.lib.virginia.edu/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 14]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.lib.virginia.edu/piwik.php?idsite=14" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->






<?php wp_footer(); ?>
</div>






</body>
</html>
