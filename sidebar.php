  <div class="col s4" id="sideNav">
    <ul id="nav-mobile" class="" style="width: 240px;">
      <li class="no-padding">
          <?php
          /**
           * The sidebar containing the main widget area.
           *
           * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
           *
           * @package uvalibrarystaff
           */

          $defaults = array(
                 'theme_location'  => 'primary',
                 'menu'            => 'primary',
                 'container_id'    => '',
                 'menu_class'      => 'collapsible collapsible-accordion',
                 'fallback_cb'     => 'sidebar_materialize_navwalker::fallback',
                 'depth'           => 3,
                 'walker'          => new sidebar_materialize_navwalker()
          );
          wp_nav_menu( $defaults );
          ?>
      </li>
    </ul>
  </div>