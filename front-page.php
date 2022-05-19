<?php get_header(); ?>


<?php if( have_rows('bottles') ): ?>
<?php while( have_rows('bottles') ): the_row(); ?>
<section class="bottles">
    <div class="bottles__container">
        <div class="bottles__leftside">
            <?php if (get_sub_field('bottles_header')):?>
            <div class="bottles__header">
                <h1><?php echo get_sub_field('bottles_header') ?></h1>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('bottles_content')):?>
            <div class="bottles__content">
                <?php echo get_sub_field('bottles_content') ?>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('bottles_button_url')):?>
            <div class="bottles__button">
                <a
                    href="<?php echo get_sub_field('bottles_button_url') ?>"><?php echo get_sub_field('bottles_button_title') ?></a>
            </div>
            <?php endif; ?>
        </div>
        <div class="bottles__rightside">
            <?php if(ICL_LANGUAGE_CODE == 'pl'): ?>
            <div class="bottles__rightside-yellow">
                <div class="bottles__rightside-bottle"
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-white-pl_butelka.webp);">
                </div>
                <div class="bottles__rightside-bottle-full "
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-white-pl_butelka_pelna.webp);">
                </div>
            </div>
            <div class="bottles__rightside-purple">
                <div class="bottles__rightside-bottle"
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-red-pl_butelka.webp);">
                </div>
                <div class="bottles__rightside-bottle-full "
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-red-pl_butelka_pelna.webp);">
                </div>
            </div>
            <?php else: ?>
            <div class="bottles__rightside-yellow">
                <div class="bottles__rightside-bottle"
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-white-en_butelka.webp);">
                </div>
                <div class="bottles__rightside-bottle-full "
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-white-en_butelka_pelna.webp);">
                </div>
            </div>
            <div class="bottles__rightside-purple">
                <div class="bottles__rightside-bottle"
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-red-en_butelka.webp);">
                </div>
                <div class="bottles__rightside-bottle-full "
                    style="background-image: url(<?php echo get_template_directory_uri(); ?>/public/images/dragma-red-en_butelka_pelna.webp);">
                </div>
            </div>
            <?php endif; ?>


        </div>
    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>
<?php if( have_rows('history') ): ?>
<?php while( have_rows('history') ): the_row(); ?>
<section class="front-history">
    <div class="front-history__container">

        <?php if (get_sub_field('history_photo')):?>
        <div class="front-history__image">
            <?php $image =  get_sub_field('history_photo') ?>
            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </div>
        <?php endif; ?>

        <div class="front-history__content">
            <?php if (get_sub_field('history_header')):?>
            <div class="front-history__header">
                <h2><?php echo get_sub_field('history_header') ?></h2>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('history_text')):?>
            <div class="front-history__text">
                <?php echo get_sub_field('history_text') ?>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('history_button_url')):?>
            <div class="front-history__button">
                <a
                    href="<?php echo get_sub_field('history_button_url') ?>"><?php echo get_sub_field('history_button') ?></a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>
<?php if (get_field('break_first')):?>
<section class="break first" style="background-image: url(<?php echo get_field('break_first');?>)">


</section>

<?php endif; ?>
<?php if( have_rows('cocktails') ): ?>
<?php while( have_rows('cocktails') ): the_row(); ?>
<section class="cocktails">
    <div class="cocktails__container">

        <?php if (get_sub_field('cocktails_photo')):?>
        <div class="cocktails__image">
            <?php $image =  get_sub_field('cocktails_photo') ?>
            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        </div>
        <?php endif; ?>

        <div class="cocktails__content">
            <?php if (get_sub_field('cocktails_header')):?>
            <div class="cocktails__header">
                <h2><?php echo get_sub_field('cocktails_header') ?></h2>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('cocktails_text')):?>
            <div class="cocktails__text">
                <?php echo get_sub_field('cocktails_text') ?>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('cocktails_button_url')):?>
            <div class="cocktails__button">
                <a
                    href="<?php echo get_sub_field('cocktails_button_url') ?>"><?php echo get_sub_field('cocktails_button') ?></a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php if (get_field('break_nd' , 'option')):?>
<section class="break nd" style="background-image: url(<?php echo get_field('break_nd', 'option');?>)">

</section>

<?php endif; ?>
<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
            'orderby'         =>  'menu_order',
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) { ?>
<section class="products-slider">
    <h4><?php echo get_field('buy_dragma_header', 'option')  ?></h4>
    <div class="products-slider__container">
        <p class="chevron-prev"><span class="chevron prev"></span>
        <ul class="products-slider__products">
            <?php
			while ( $loop->have_posts() ) : $loop->the_post();


				wc_get_template_part( 'content', 'product' );
                
        			endwhile;
	
	?>
        </ul>
        <p class="chevron-next"><span class="chevron next"></span>
    </div>
    <div class="products-slider__gotoshop">
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ) ?>">
            <?php echo get_field('go_to_shop_button', 'option')  ?></a>
    </div>
</section>
<?php	} 
		wp_reset_postdata(); ?>

<script>
if (window.matchMedia('(min-width: 1650px)').matches) {

    $(window).scroll(function() {
        var scroll = $(window).scrollTop(),
            dh = $(window).innerHeight(),
            wh = $('.bottles__container').height();
        scrollPercent = (scroll / (dh)) * 70;
        $(".bottles__rightside-bottle-full").css('height', scrollPercent + '%');
    })
    // change functionality for smaller screens
} else if (window.matchMedia('(min-width: 1000px)').matches) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop(),
            dh = $(window).innerHeight(),
            wh = $('.bottles__container').height();
        scrollPercent = (scroll / (dh)) * 60;
        $(".bottles__rightside-bottle-full").css('height', scrollPercent + '%');
    })
} else if (window.matchMedia('(min-width: 600px)').matches) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop(),
            dh = $(window).innerHeight(),
            wh = $('.bottles__container').height();
        scrollPercent = (scroll / (dh)) * 90;
        $(".bottles__rightside-bottle-full").css('height', scrollPercent + '%');
    })
} else if (window.matchMedia('(min-width: 400px)').matches) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop(),
            dh = $(window).innerHeight(),
            wh = $('.bottles__container').height();
        scrollPercent = (scroll / (dh)) * 80;
        $(".bottles__rightside-bottle-full").css('height', scrollPercent + '%');
    })
} else if (window.matchMedia('(min-width: 0px)').matches) {
    $(window).scroll(function() {
        var scroll = $(window).scrollTop(),
            dh = $(window).innerHeight(),
            wh = $('.bottles__container').height();
        scrollPercent = (scroll / (dh)) * 55;
        $(".bottles__rightside-bottle-full").css('height', scrollPercent + '%');
    })
}
</script>
<?php get_footer(); ?>