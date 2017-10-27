<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package uvalibrarystaff
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!-- Fonts  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
	<?php wp_head(); ?>

  <script src="//static.lib.virginia.edu/js/controllers/staffweb.js"></script>
  <script src="https://use.typekit.net/cwp8apd.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

<!--test comment-->
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uva-library-staff' ); ?></a>

	<header id="masthead" class="site-header" role="banner">




  <div class="container" id="header">
    <div class="row valign-wrapper">

          <div class="col m12 l8" id="logo-container">
            <div class="section">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="brand-logo"><img src="<?php bloginfo('template_directory'); ?>/images/UVaLibLogoHoriz.png" id="uvaLogo" /></a>
            </div>
            <div class="divider"></div>
            <div class="section">
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1>Staff</h1></a>
            </div>
          </div>
          <div class="col m12 l4">
                  <?php get_search_form(); ?>
           </div>
    </div>


  </div>


  <!-- end menu -->




	</header><!-- #masthead -->

<?php include("inc/navbar.php"); ?>
