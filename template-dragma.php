<?php
/*
Template Name: Oto Dragma
Template Post Type: post, page, event
*/?>


<?php get_header(); ?>
<section class="main">
    <div class="main__text">
        <?php the_field('dragma_text');?>
    </div>
    <?php if( have_rows('dragma_products') ): ?>

<section class="bott__blocks">
    <?php while( have_rows('dragma_products') ): the_row(); ?>
    <div class="bott__blocks-item">
        <div class="bott__blocks-image">
            <?php $image =  get_sub_field('dragma_photo') ?>
            <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php $imagefull =  get_sub_field('dragma_photo_full') ?>
                 <div class="full" style="background-image: url(<?php echo esc_url($imagefull['sizes']['large']); ?>);"></div>
        </div>
        <div class="bott__blocks-title">
            <h4><?php echo get_sub_field('dragma_title') ?></h4>
            <p><?php echo get_sub_field('dragma_quote') ?></p>
        </div>
        <div class="bott__blocks-text">
            <?php echo get_sub_field('dragma_products_text') ?>
        </div>
    </div>


    <?php endwhile; ?>
</section>
<?php endif; ?>
</section>

<?php if (get_field('break_nd', 'option')):?>
<section class="break nd" style="background-image: url(<?php echo get_field('break_nd', 'option');?>)">


    <?php endif; ?>

</section>
<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
            'orderby'         =>  'menu_order',
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) { ?>
<section class="products-slider">`
    <h4><?php echo get_field('buy_dragma_header', 'option')  ?>
 </h4>
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
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ) ?>">  <?php echo get_field('go_to_shop_button', 'option')  ?></a>
    </div>
</section>
<?php	} 
		wp_reset_postdata(); ?>
<script>


if (window.matchMedia('(min-width: 1600px)').matches)
{

    $(window).scroll(function() {
    var scroll = $(window).scrollTop(),
        dh = $(window).innerHeight(),
        wh = $('.bott__blocks').height();
    scrollPercent = (scroll / (dh)) * 65;
    $(".full").css('height', scrollPercent + '%');
})

    // change functionality for smaller screens
}  else if (window.matchMedia('(min-width: 0px)').matches) { 
    $(window).scroll(function() {
    var scroll = $(window).scrollTop(),
        dh = $(window).innerHeight(),
        wh = $('.main').height();
    scrollPercent = (scroll / (dh)) * 40;
    $(".full").css('height', scrollPercent + '%');
})
}
</script>
<?php get_footer(); ?>
