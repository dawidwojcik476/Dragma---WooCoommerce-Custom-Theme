<?php get_header(); ?>
<?php $product = wc_get_product();?>
<main class="single-product__container">
    <div class="single-product__topside">
        <section class="single-product__info">

            <div class="single-product__gallery">
                <?php 
                        $imagesArray = get_field('product_gallery');
                         if( $imagesArray ): ?>
                <p class="chevron-next"><span class="chevron next"></span>
                <ul>
                    <?php foreach( $imagesArray as $image ): ?>
                    <li class="single-product__gallery-item">
                        <a href="<?php echo esc_url($image['url']); ?>"
                            data-title="<?php echo esc_html($image['caption']); ?>" data-lightbox="roadtrip">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />

                        </a>

                    </li>
                    <?php endforeach; ?>
                </ul>

                <p class="chevron-prev"><span class="chevron prev"></span>
                    <?php endif; ?>

            </div>
            <div class="single-product__rightside">
                <div class="single-product__info-content">
                    <h1><?php the_title(); ?></h1>
                    <div class="single-product__info-textwrapper">
                        <?php  the_content(); ?>
                    </div>


                </div>
                <div class="single-product__info-addtocart">
                    <div class="single-product__info-price">
                        <?php echo $product->get_price_html(); ?>
                    </div>
                    
                    <div class="single-product__info-botside">
                        <div class="single-product__info-quantity">

                            <p><?php echo __('Ilość:')?></p>

                            <?php $quantity_field = woocommerce_quantity_input( array(
                            'input_name'  => 'product_id',
                            'input_value' => ! empty( $product->cart_item['quantity'] ) ? $product->cart_item['quantity'] : 0,
                            'max_value'   => $product->backorders_allowed() ? '' : $product->get_stock_quantity(),
                            'min_value'   => 1,
                             ), $product, false );

                             echo $quantity_field ;?>

                        </div>
                        <div class="single-product__info-addbutton">


                            <?php echo do_shortcode( '[add_to_cart id=' .  $product->get_id() . ' ]' ) ?>
                        </div>

                    </div>

                </div>
            </div>



        </section>
    </div>
    <div class="single-product__bottom">
        <div class="single-product__info-quote">
            <?php  the_field('product_quote');  ?>
        </div>
    </div>


</main>

<?php


$data= new WP_Query(array(
    'post_type' => 'recipes',
    'posts_per_page' => 3,
    'orderby' =>  'menu_order',
));?>

<section class="recipes">
    <h1><?php echo __('Rozsmakuj się...')?></h1>
    <div class="recipes__container">
        <div class="recipes__items">
            <?php if($data->have_posts()) :
    while($data->have_posts())  : $data->the_post();?>
            <div class="recipes__item">
                <div class="recipes__image">

                    <?php echo wp_get_attachment_image( get_post_thumbnail_id(), 'large' ); ?>

                    <div class="recipes__find">
                        <p><?php echo __('Obróć')?></p>
                    </div>
                </div>
                <div class="recipes__content" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                    <p class="recipes__content-header"> <?php  the_title(); ?></p>
                    <p class="recipes__content-author"><?php the_field('recipe_author') ?></p>
                    <div class="recipes__content-text"> <?php  the_excerpt();  ?></div>
                    <div class="recipes__content-buton">
                        <a href="<?php echo get_permalink(); ?>"> <?php echo __('Zobacz przepis') ?></a>
                    </div>

                </div>

            </div>
            <?php     endwhile; ?>


        </div>

        <?php endif; ?>

        <?php wp_reset_postdata();?>


    </div>

</section>
<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 3,
    'orderby'         =>  'menu_order',
    );
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) { ?>
<section class="products">
    <h4><?php echo __('Zobacz jeszcze'); ?></h4>
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
?>
<script>
$(document).ready(function() {

    $('.qty').prop('readonly', true);

    $(".plus").on("click", function() {



        var i = parseInt($(".add_to_cart_button").attr('data-quantity'));
        $(".add_to_cart_button").attr('data-quantity', i + 1);


    });

    $(".minus").on("click", function() {
        if ($('.qty').val() > 1) {


            var i = parseInt($(".add_to_cart_button").attr('data-quantity'));
            $(".add_to_cart_button").attr('data-quantity', i - 1);

        }
    });

});
</script>
<?php get_footer(); ?>