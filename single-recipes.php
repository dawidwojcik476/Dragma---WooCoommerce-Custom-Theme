<?php get_header(); ?>

<h1><?php the_title(); ?></h1>
<?php if( have_rows('recipe_start') ): ?>
<?php while( have_rows('recipe_start') ): the_row(); ?>

<section class="main recipe">



    <div class="recipe__leftside"     <?php if (!get_sub_field('recipe_image')):?>style="width:100%"<?php endif; ?>>
        <h2> <?php echo get_sub_field('recipe_title') ?></h2>
        <div class="recipe__leftside-content">
            <?php echo get_sub_field('recipe_text') ?>
        </div>
        <?php if( have_rows('recipe_blocks') ): ?>

        <div class="recipe__leftside-points">
            <?php while( have_rows('recipe_blocks') ): the_row(); ?>
            <div class="recipe__leftside-item">

                <div class="recipe__leftside-item-image">
                    <?php $icon =  get_sub_field('recipe_block_icon') ?>
                    <img src="<?php echo esc_url($icon['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($icon['alt']); ?>" />
                </div>

                <p><?php echo get_sub_field('recipe_block_title') ?></p>
            </div>
            <?php endwhile; ?>
        </div>

        <?php endif; ?>
    </div>
    <?php if (get_sub_field('recipe_image')):?>
    <div class="recipe__rightside">
        <?php $image =  get_sub_field('recipe_image') ?>
        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
    <?php endif; ?>
</section>
<?php endwhile; ?>
<?php endif; ?>

<?php if( have_rows('recipe_ready') ): ?>
<?php while( have_rows('recipe_ready') ): the_row(); ?>

<section class="main readys">
    <h3><?php echo get_sub_field('recipe_ready_title') ?></h3>
    <div class="readys__content">
        <?php echo get_sub_field('recipe_ready_text') ?>
    </div>
    <div class="readys__gallery">
        <?php 
                        $imagesArray = get_sub_field('recipe_ready_gallery');
                         if( $imagesArray ): ?>
        <p class="chevron-next"><span class="chevron next"></span>
        <ul>
            <?php foreach( $imagesArray as $image ): ?>
            <li class="readys__gallery-item">
                <a href="<?php echo esc_url($image['url']); ?>" data-title="<?php echo esc_html($image['caption']); ?>"
                    data-lightbox="roadtrip">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />

                </a>

            </li>
            <?php endforeach; ?>
        </ul>

        <p class="chevron-prev"><span class="chevron prev"></span>
            <?php endif; ?>
    </div>
</section>

<?php

$data= new WP_Query(array(
    'post_type' => 'recipes',
    'numberposts' => 3,
    'posts_per_page' => 3,
    'suppress_filters' => false
));?>

<section class="recipes">
    <h1> <?php echo get_field('coctails_check_header', 'option')  ?></h1>
    <div class="recipes__container">
        <div class="recipes__items">
            <?php if($data->have_posts()) :
    while($data->have_posts())  : $data->the_post();?>
            <div class="recipes__item">
                <div class="recipes__image">
                    <?php the_post_thumbnail(); ?>
                    <div class="recipes__find">
                        <p> <?php echo get_field('coctails_show_rotate_button', 'option')  ?></p>
                    </div>
                </div>
                <div class="recipes__content" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                    <p class="recipes__content-header"> <?php  the_title(); ?></p>
                    <p class="recipes__content-author"><?php the_field('recipe_author') ?></p>
                    <div class="recipes__content-text"> <?php  the_excerpt();  ?></div>
                    <div class="recipes__content-buton">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php echo get_field('chwala_przekornym_more_button', 'option')  ?></a>
                    </div>

                </div>

            </div>
            <?php     endwhile; ?>


        </div>

        <?php endif; ?>

        <?php wp_reset_postdata();?>


    </div>

</section>

<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>