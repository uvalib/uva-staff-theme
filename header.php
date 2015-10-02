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
<link href='http://fonts.googleapis.com/css?family=Limelight|Hind' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">


    <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
  <script src="/js/plugins/materialize.min.js"></script>
  <script src="/js/init.js"></script>

<!--test comment-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'uva-library-staff' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

<div class="row lighten-4 topNav">
  <div class="container" id="topNavLinks">
        <div class="col s12">
        <a href="http://www.virginia.edu"> U.Va. Home</a> | 
        <a href="http://hr.virginia.edu"> U.Va. Human Resources</a> | 
        <a href="http://library.virginia.edu"> U.Va. Library Home</a> | 
        <a href="http://library.virginia.edu"> Staff Directory</a> | 
        <a href="http://www.virginia.edu">SSTL</a> | 
        <a href="http://www.virginia.edu">Benefits@U.Va.</a> | 
        <a href="http://www.virginia.edu">Lead@U.Va.</a>
        </div>
  </div>
</div>



  <div class="container" id="header">
    <div class="row" id="logo">

          <div class="col s8">
                  <a id="logo-container" href="#" class="brand-logo left"><img src="/wp-content/uploads/2015/08/UVaLibLogo.png" id="uvaLogo" /></a><a href=""><h1 class="header left-align black-text">Staff</h1></a>
          </div>
          <div class="col s4">
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



