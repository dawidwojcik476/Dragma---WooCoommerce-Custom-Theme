<?php get_header(); ?>

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$data= new WP_Query(array(
    'post_type'=>'recipes', // your post type name
    'posts_per_page' => 12, // post per page
    'paged' => $paged,
));?>

<section class="recipes">
    <h1><?php echo get_field('coctails_header', 'option')  ?></h1>
    <div class="recipes__container">
        <div class="recipes__items">
            <?php if($data->have_posts()) :
    while($data->have_posts())  : $data->the_post();?>
            <div class="recipes__item">
                <div class="recipes__image">
                    <?php the_post_thumbnail(); ?>
                    <?php if (get_field('recipe_rotate_text')):?>
                    <div class="recipes__find">
                        <p><?php the_field('recipe_rotate_text') ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="recipes__content" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                    <p class="recipes__content-header"> <?php  the_title(); ?></p>
                    <p class="recipes__content-author"><?php the_field('recipe_author') ?></p>
                    <div class="recipes__content-text"> <?php  the_excerpt();  ?></div>
                    <div class="recipes__content-buton">
                        <a href="<?php echo get_permalink(); ?>"><?php echo get_field('coctails_show_recipe_button', 'option')  ?></a>
                    </div>

                </div>

            </div>
            <?php     endwhile; ?>


        </div>
        <div class="recipes__pagination">
                <?php  $total_pages = $data->max_num_pages;

if ($total_pages > 1){

    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '?paged=%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text'    => __('Poprzednia'),
        'next_text'    => __('Następna'),
    ));
}
?>
                <?php else :?>
                <h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>
                <?php endif; ?>

                <?php wp_reset_postdata();?>

            </div>
    </div>

</section>


<?php get_footer(); ?>