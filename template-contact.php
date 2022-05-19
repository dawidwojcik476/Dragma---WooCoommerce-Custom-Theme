<?php
/*
Template Name: Kontakt
Template Post Type: post, page, event
*/?>


<?php get_header(); ?>
<div class="contact">

<h1><?php the_title();?></h1>
    <div class="contact__container">
       

        <section class="contact-data">

            <?php if( have_rows('contact_data') ): ?>
            <?php while( have_rows('contact_data') ): the_row(); ?>
            <div class="contact-data__item">
                <h3><?php echo __('Dane teleadresowe:'); ?></h3>
                <?php if( have_rows('contact_data_phone') ): ?>
                <?php while( have_rows('contact_data_phone') ): the_row(); ?>
                <a href="tel:<?php echo get_sub_field('contact_data_phone_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/awesome-phone-alt.webp"
                        alt="tel:<?php echo get_sub_field('contact_data_phone_input') ?>"><?php echo __('Tel: ')?>
                    <?php echo get_sub_field('contact_data_phone_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('contact_data_email') ): ?>
                <?php while( have_rows('contact_data_email') ): the_row(); ?>
                <a href="emailto:<?php echo get_sub_field('contact_data_email_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/zocial-email.webp"
                        alt="emailto:<?php echo get_sub_field('contact_data_email_input') ?>"><?php echo __('Email: ')?><?php echo get_sub_field('contact_data_email_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php if( have_rows('contact_idea') ): ?>
            <?php while( have_rows('contact_idea') ): the_row(); ?>
            <div class="contact-data__item">
                <h3><?php echo __('Masz pytanie lub pomysł? '); ?></h3>
                <?php if( have_rows('contact_idea_phone') ): ?>
                <?php while( have_rows('contact_idea_phone') ): the_row(); ?>
                <a href="tel:<?php echo get_sub_field('contact_idea_phone_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/awesome-phone-alt.webp"
                        alt="tel:<?php echo get_sub_field('contact_idea_phone_input') ?>"><?php echo __('Tel: ')?>
                    <?php echo get_sub_field('contact_idea_phone_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('contact_idea_email') ): ?>
                <?php while( have_rows('contact_idea_email') ): the_row(); ?>
                <a href="emailto:<?php echo get_sub_field('contact_idea_email_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/zocial-email.webp"
                        alt="emailto:<?php echo get_sub_field('contact_idea_email_input') ?>"><?php echo __('Email: ')?><?php echo get_sub_field('contact_idea_email_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('contact_shop') ): ?>
            <?php while( have_rows('contact_shop') ): the_row(); ?>
            <div class="contact-data__item">
                <h3><?php echo __('Prowadzisz restaurację lub sklep?'); ?></h3>
                <?php if( have_rows('contact_shop_phone') ): ?>
                <?php while( have_rows('contact_shop_phone') ): the_row(); ?>
                <a href="tel:<?php echo get_sub_field('contact_shop_phone_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/awesome-phone-alt.webp"
                        alt="tel:<?php echo get_sub_field('contact_shop_phone_input') ?>"><?php echo __('Tel: ')?><?php echo get_sub_field('contact_shop_phone_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('contact_shop_email') ): ?>
                <?php while( have_rows('contact_shop_email') ): the_row(); ?>
                <a href="emailto:<?php echo get_sub_field('contact_shop_email_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/zocial-email.webp"
                        alt="emailto:<?php echo get_sub_field('contact_shop_email_input') ?>"><?php echo __('Email: ')?><?php echo get_sub_field('contact_shop_email_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

            <?php if( have_rows('contact_barman') ): ?>
            <?php while( have_rows('contact_barman') ): the_row(); ?>
            <div class="contact-data__item">
                <h3><?php echo __('Masz pytanie do naszych barmanów?'); ?></h3>
                <?php if( have_rows('contact_barman_phone') ): ?>
                <?php while( have_rows('contact_barman_phone') ): the_row(); ?>
                <a href="tel:<?php echo get_sub_field('contact_barman_phone_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/awesome-phone-alt.webp"
                        alt="tel:<?php echo get_sub_field('contact_barman_phone_input') ?>"><?php echo __('Tel: ')?>
                    <?php echo get_sub_field('contact_barman_phone_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php if( have_rows('contact_barman_email') ): ?>
                <?php while( have_rows('contact_barman_email') ): the_row(); ?>
                <a href="emailto:<?php echo get_sub_field('contact_barman_email_input') ?>"> <img
                        src="<?php echo get_template_directory_uri(); ?>/public/images/zocial-email.webp"
                        alt="emailto:<?php echo get_sub_field('contact_barman_email_input') ?>"><?php echo __('Email: ')?><?php echo get_sub_field('contact_barman_email_input') ?></a>
                <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <?php endwhile; ?>
            <?php endif; ?>

        </section>
        <section class="contact__form">
        <h3><?php echo __('Formularz kontaktowy:'); ?></h3>

            <?php if(ICL_LANGUAGE_CODE == 'pl'): ?>
            <?php echo do_shortcode('[contact-form-7 id="5" title="Kontakt"]');?>
            <?php elseif(ICL_LANGUAGE_CODE == 'en'): ?>
            <?php echo do_shortcode('[contact-form-7 id="199" title="Kontakt ENG"]');?>
            <?php endif; ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>