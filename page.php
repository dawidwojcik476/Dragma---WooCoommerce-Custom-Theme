<?php get_header(); ?>
<?php if (is_shop()):

$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'orderby'         =>  'menu_order',
    );
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) { ?>
<section class="products">
    <h4><?php echo get_field('buy_dragma_header', 'option')  ?></h4>
    <div class="products__container">

        <ul class="products__items">
            <?php
    while ( $loop->have_posts() ) : $loop->the_post();


        wc_get_template_part( 'content', 'product' );
        
            endwhile;

?>
        </ul>

    </div>

</section>
<?php	} 
wp_reset_postdata(); 

elseif (is_cart()): ?>
<section class="main cart">
    <h1><?php echo __('Koszyk')?></h1>
    <?php the_content(); ?>
</section>
<?php else: ?>
<section class="main">
    <?php the_content(); ?>
</section>
<?php endif; ?>




<?php get_footer(); ?>