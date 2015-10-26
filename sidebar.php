  <div class="col s4" id="sideNav0">
    <ul id="nav-mobile0" class="" style="width: 240px;">
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <?php
          /**
           * The sidebar containing the main widget area.
           *
           * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
           *
           * @package uvalibrarystaff
           */




          $defaults = array(
                 'theme_location'  => '',
                 'menu'            => '',
                 'container'       => 'div',
                 'container_class' => 'col s4',
                 'container_id'    => 'sideNav',
                 'menu_class'      => '',
                 'menu_id'         => 'nav-mobile',
                 'echo'            => true,
                 'fallback_cb'     => 'wp_page_menu',
                 'before'          => '',
                 'after'           => '',
                 'link_before'     => '',
                 'link_after'      => '',
                 'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                 'depth'           => 0,
                 'walker'          => ''
          );

          //wp_nav_menu( $defaults );

          ?><!-- This last div stays after the menu content goes away. -->
        </ul>
      </li>
    </ul>
  </div>

  <div class="col s4" id="sideNav">
    <ul id="nav-mobile" class="" style="width: 240px;">
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li class="bold">
            <a class="collapsible-header waves-effect waves-teal">Recent Announcements</a>

            <div class="collapsible-body" style="">
              <ul>
                <li><a href="#">News</a></li>

                <li><a href="#">Events</a></li>
              </ul>
            </div>
          </li>

          <li class="bold">
            <a class="collapsible-header waves-effect waves-teal">Employee Services</a>

            <div class="collapsible-body" style="">
              <ul>
                <li><a href="color.html">Policies &amp; Procedures</a></li>

                <li>
                  <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                      <a class="collapsible-header waves-effect waves-teal">Resources for Managers</a>

                      <div class="collapsible-body" style="">
                        <ul>
                          <li><a href="#">Hiring, Supervising, Evaluating</a></li>

                          <li><a href="#">Background check request form</a></li>

                          <li><a href="#">Performance evaluations</a></li>

                          <li><a href="#">Strategic Leadership Team (SLT)</a></li>

                          <li><a href="#">Library Leadership: Roles and Accountabilities</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>

                <li>
                  <ul class="collapsible collapsible-accordion">
                    <li class="bold">
                      <a class="collapsible-header waves-effect waves-teal">Budget &amp; Grants</a>

                      <div class="collapsible-body" style="">
                        <ul>
                          <li><a href="#">Budget</a></li>

                          <li><a href="#">Grants</a></li>

                          <li><a href="#">Leadership Programs for Academic Librarians</a></li>
                        </ul>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </li>

          <li class="bold">
            <a class="collapsible-header waves-effect waves-teal">For New Employees</a>

            <div class="collapsible-body" style="">
              <ul>
                <li><a href="/u-va-parking/">U.Va. Parking</a></li>

                <li><a href="/u-va-dining/">U.Va. Dining</a></li>
              </ul>
            </div>
          </li>

          <li><a href="/forms-documents/">Forms &amp; Documents</a></li>

          <li><a href="/computing/">Computing</a></li>

          <li><a href="/organizational-design/">Organizational Design</a></li>

          <li><a href="/library-buildings-and-spaces/">Library Buildings &amp; Spaces</a></li>

          <li><a href="/emergency/">In an Emergency</a></li>

          <li><a href="/hr-budget-grants-2/">HR, Budget, Grants</a></li>

          <li><a href="/styleguide/">Style Guide</a></li>

          <li><a href="/postie-send-a-post-via-email/">Postie: Send a Post via Email</a></li>

          <li><a href="/academic-engagement-staff/">Academic Engagement Staff</a></li>

          <li><a href="/libx-user-experience-team-help-request-form/">LibX User Experience Team: Help Request Form</a></li>

          <li><a href="/7420-2/">Staff info</a></li>

          <li><a href="/?page_id=7362">Academic Engagement (old)</a></li>

          <li><a href="/about/">About</a></li>
        </ul>
      </li>
    </ul><!-- This last div stays after the menu content goes away. -->
  </div>
