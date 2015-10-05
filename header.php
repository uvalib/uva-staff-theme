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


  <!-- CSS  -->
  <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">


    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  <script src="/js/plugins/materialize.min.js"></script>
  <script src="/js/init.js"></script>



  <script src="https://use.typekit.net/cwp8apd.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<!--test comment-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uva-library-staff' ); ?></a>

	<header id="masthead" class="site-header" role="banner">




  <div class="container" id="header">
    <div class="row valign-wrapper">

          <div class="col m12 l8" id="logo-container">
            <div class="section">
                  <a href="#"><h1 class="brand-logo"><img src="wp-content/themes/uvalibrarystaff/images/UVaLibLogoHoriz.png" id="uvaLogo" /></a>
            </div>
            <div class="divider"></div>
            <div class="section">
                      <a href=""><h1>Staff</h1></a>
            </div>
          </div>
          <div class="col m12 l4">
                  <form>
                    <div class="input-field">
                      <input id="search" type="search" required>
                      <label for="search"><i class="mdi-action-search"></i></label>
                      <i class="mdi-navigation-close"></i>
                    </div>
                  </form>
           </div>
    </div>
  

  </div>

  
  <!-- end menu -->




	</header><!-- #masthead -->

<?php include("inc/navbar.php"); ?>



