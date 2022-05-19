<?php get_header(); ?>
<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
            'orderby'         =>  'menu_order',
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) { ?>
<section class="products-slider">
    <h4><?php echo __('Kup Dragmę'); ?></h4>
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
        <a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ) ?>"> <?php echo __('Idź do sklepu')?></a>
    </div>
</section>
<?php	} 
		wp_reset_postdata(); ?>
<?php get_footer(); ?>

