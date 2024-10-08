<header class="sk-header">

  <div class="sk-container">

    <?php
    $url = home_url();

    // Nav menu  
    if (has_nav_menu('primary')) { ?>
      <nav id="site-navigation" class="main-navigation sk-navbar is-justify-content-space-between">
        <div class="sk-navbar-brand">
          <a class="" href="<?php echo $url; ?>">
            <?php include 'logo.php' ?>
            <!-- <img src="data:image/svg+xml;base64,"> -->
          </a>

          <a role="button" class="sk-navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="menu-navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
        <div id="menu-navbar" class="sk-navbar-menu"> <?php
        wp_nav_menu(
          array(
            "container" => "div",
            "container_class" => "sk-navbar",
            'theme_location' => 'primary',
            // 'menu_id' => 'primary-menu',
            // 'menu_class' => '',     // ignored
            // 'container' => '',     // ignored        
            'items_wrap' => '%3$s', // NOT ignored
            'walker' => new Bulma_Navwalker()
          )
        ); ?>
        </div><?php
    }
    ?>

  </div>

</header>