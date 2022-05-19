<footer class="footer <?php if ( is_search()) :?> goldenborder <?php endif;?>">
    <?php if ( !is_search()):?>

    <section class="footer__newsletter"
        style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/newsletterbg.webp);">
        <div class="footer__newsletter-container">
            <div class="footer__newsletter-content">
                <h5> <?php echo get_field('newsletter_header', 'option')  ?></h5>
                <p> <?php echo get_field('newsletter_header_text', 'option')  ?>
                </p>
            </div>
            <div class="footer__newsletter-email">
                <?php if(ICL_LANGUAGE_CODE == 'pl'): ?>
                <?php echo do_shortcode('[newsletter_form button_label=" "]
[newsletter_field name="email" label="" placeholder="Wpisz swój adres e-mail"] [/newsletter_form]');?>
                <?php elseif(ICL_LANGUAGE_CODE == 'en'): ?>
                <?php echo do_shortcode('[newsletter_form button_label=" "]
[newsletter_field name="email" label="" placeholder="Please enter your e-mail address"][/newsletter_form]');?>
                <?php endif; ?>

            </div>

        </div>

    </section>

    <?php endif; ?>

    <section class="footer__menu">
        <div class="footer__logo">

            <a class="footer__logo-link" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php if( get_field('header_logo', 'option') ): ?>
                <img class="footer__logo-image" src="<?php echo get_field('header_logo', 'option'); ?>" alt="Logo" />
                <?php endif; ?>

            </a>


        </div>

        <div class="footer__menu-container">
            <?php    wp_nav_menu([
                              'theme_location'    => 'footer-menu',
                              'menu_id'            => 'footer-menu',
                              'container_class'   => 'footer__menu-list',
                              'container_id'      => '',
                              'menu_class'        => 'footer__menu-ul',
                ]); ?>

        </div>

        <?php if( have_rows('social_media', 'option') ): ?>

        <div class="footer__socials">
            <?php while( have_rows('social_media', 'option') ): the_row(); ?>
            <div class="footer__socials-item">
                <a href="<?php echo get_sub_field('social_media_link') ?>" target="_blank">
                    <?php $image =  get_sub_field('social_media_icon') ?>
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" /></a>
            </div>
            <?php endwhile; ?>
        </div>

        <?php endif; ?>
    </section>

    <div class="footer__copyrights">
        <a href="https://coolbrand.pl/">Coolbrand 2021</a>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>