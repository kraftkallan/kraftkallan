<header class="sk-header sk-card">
  
  <?php
    $url = home_url();
    
    // Nav menu  
    if (has_nav_menu('primary')) { ?>
      <nav id="site-navigation" class="main-navigation sk-navbar">
        <div class="sk-container sk-is-max-desktop">
          <div class="sk-navbar-brand">
            <a class="" href="<?php echo $url; ?>">
              <h1 class="is-sr-only"><?php bloginfo( 'name' ); ?></h1>
              <?php include 'logo.php' ?>              
            </a>
            <a role="button" class="sk-navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="menu-navbar">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>
          <div id="menu-navbar" class="sk-navbar-menu is-justify-content-flex-end"> <?php
            wp_nav_menu(
              array(
                "container" => "div",
                "container_class" => "sk-navbar",
                'theme_location' => 'primary',                
                'items_wrap' => '%3$s',
                'walker' => new Bulma_Navwalker()
              )
            ); ?>
          </div>
        </div>
      </nav> <?php
    }

  ?>

</header>