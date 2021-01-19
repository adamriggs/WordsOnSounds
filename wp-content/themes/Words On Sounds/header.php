<!DOCTYPE html>
<!-- 
██████╗  █████╗ ███████╗██╗ ██████╗    ██╗    ██╗███████╗██████╗ ███████╗██╗████████╗███████╗     █████╗  ██████╗ ███████╗███╗   ██╗ ██████╗██╗   ██╗
██╔══██╗██╔══██╗██╔════╝██║██╔════╝    ██║    ██║██╔════╝██╔══██╗██╔════╝██║╚══██╔══╝██╔════╝    ██╔══██╗██╔════╝ ██╔════╝████╗  ██║██╔════╝╚██╗ ██╔╝
██████╔╝███████║███████╗██║██║         ██║ █╗ ██║█████╗  ██████╔╝███████╗██║   ██║   █████╗      ███████║██║  ███╗█████╗  ██╔██╗ ██║██║      ╚████╔╝ 
██╔══██╗██╔══██║╚════██║██║██║         ██║███╗██║██╔══╝  ██╔══██╗╚════██║██║   ██║   ██╔══╝      ██╔══██║██║   ██║██╔══╝  ██║╚██╗██║██║       ╚██╔╝  
██████╔╝██║  ██║███████║██║╚██████╗    ╚███╔███╔╝███████╗██████╔╝███████║██║   ██║   ███████╗    ██║  ██║╚██████╔╝███████╗██║ ╚████║╚██████╗   ██║   
╚═════╝ ╚═╝  ╚═╝╚══════╝╚═╝ ╚═════╝     ╚══╝╚══╝ ╚══════╝╚═════╝ ╚══════╝╚═╝   ╚═╝   ╚══════╝    ╚═╝  ╚═╝ ╚═════╝ ╚══════╝╚═╝  ╚═══╝ ╚═════╝   ╚═╝   
 -->
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
<!--     <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NSH94G7');</script> -->
    <!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id="></script> -->
    <script>
    // window.dataLayer = window.dataLayer || [];
    // function gtag(){dataLayer.push(arguments);}
    // gtag('js', new Date());

    // gtag('config', '');
    </script>
</head>
<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
<!--     <noscript><iframe src="https://www.googletagmanager.com/ns.html?id="
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    
    <header class="row">
        <div class="header__desktop row middle col-12">
            <h1 class="col-4 middle">
                <a href="/" title="Words On Sounds">
                    <img class="site-logo" src="<?php echo get_template_directory_uri() . '/images/logo-site.png'; ?>" />
                </a>
            </h1>
            <div class="header__menu row col-8 middle">
                <?php 
                    wp_nav_menu(array(
                        'menu' => 'primary',
                        'container' => 'nav',
                        'container_class' => 'menu col-8',
                        'menu_class' => 'row',
                    )); 
                ?>
                <div class="header__buttons row col-4 end">
                    <div class="col-10"><?php include get_template_directory() . '/inc/social.php'; ?><input type="text" class="search__input search__header"></div>
                    <div class="col-2 end"><img class="search__button search__header" src="<?php echo get_template_directory_uri() . '/images/search.png'; ?>" /></div>
                </div>
            </div>
        </div>

        <div class="header__mobile row middle bottom">
            <a class="col-12" href="/" title="Words On Sounds">
                <img class="site-logo" src="<?php echo get_template_directory_uri() . '/images/logo-site.png'; ?>" />
            </a>
            <div class="header__buttons row col-10 start">
                <div class=""><?php include get_template_directory() . '/inc/social.php'; ?></div>
                <div class="search__mobile"><img class="search__button search__header" src="<?php echo get_template_directory_uri() . '/images/search.png'; ?>" /><input type="text" class="search__input search__header"></div>

            </div>
            <div class="header__menu__secondary col-2 middle end">
                <button id="hamburger-menu" class="hamburger hamburger--spin" type="button">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </button>
                <?php wp_nav_menu(array(
                    'menu' => 'primary',
                    'container' => 'nav',
                    'container_class' => 'menu',
                    'menu_class' => 'col-2',
                    'container_id' => 'menu__mobile'
                )); ?>
            </div>
        </div>
    </header>
    
