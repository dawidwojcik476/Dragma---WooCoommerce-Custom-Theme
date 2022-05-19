<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/png" href="<?php the_field('favicon','option'); ?>" />
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-M53MXLQ');
    </script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-221160213-1">
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-221160213-1');
    </script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M53MXLQ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper" class="hfeed app-container">
        <header class="header">
            <div class="header__container">
                <div class="header__logo">
                    <a class="header__logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php if( get_field('header_logo', 'option') ): ?>
                        <img class="header__logo-image" src="<?php echo get_field('header_logo', 'option'); ?>"
                            alt="Logo" />
                        <?php endif; ?>

                    </a>

                </div>
                <nav class="header__menu">

                    <?php    wp_nav_menu([      
                    'menu' => 'main-menu',
                      'theme_location'    => 'primary-menu',
                      'menu_id'            => 'primary-menu',
            
                      'container_id'      => '',
                      'menu_class'        => 'header__menu-ul',
               ]); ?>


                </nav>
                <div class="header__cart">

                    <div class="header__cart-search">
                        <div class="header__cart-search-button"
                            onclick="document.querySelector('#searchsubmit').click()">

                        </div>
                        <div class="header__cart-search-form">
                            <?php get_search_form(); ?>
                        </div>

                    </div>

                    <?php
            $items_count = WC()->cart->get_cart_contents_count();?>

                    <a href="<?php echo wc_get_cart_url() ?>" class="header__cart-icon">
                        <p class="header__cart-counter">0</p>
                    </a>
                    <div class="header__langswitch">
                        <?php echo do_shortcode('[wpml_language_selector_widget]')?>
                    </div>
                    <div class="header__ham">
                        <div class="header__ham-menubtn"></div>
                    </div>
                </div>



            </div>

        </header>

        <?php if(is_front_page()):?>
        <section class="header__background">
            <a href="/#footer"></a>
        </section>
        <?php endif; ?>

        <script>
        const getSearch = document.querySelector('.search-no-results');
        if (getSearch) {
            document.querySelector('.header__cart-search').remove();
        }
        </script>