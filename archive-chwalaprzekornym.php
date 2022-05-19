<?php get_header(); ?>

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$data= new WP_Query(array(
    'post_type'=>'chwalaprzekornym', // your post type name
    'posts_per_page' => 12, // post per page
    'paged' => $paged,
));?>

<section class="chwala-archive">
    <div class="chwala-archive__header">
    <h1> <?php echo get_field('chwala_przekornym_header', 'option')  ?></h1>
    <?php echo get_field('chwala_descript', 'option')?>
    </div>

    <div class="chwala-archive__container">
        <div class="chwala-archive__items">
            <?php if($data->have_posts()) :
             while($data->have_posts())  : $data->the_post();?>
            <div class="chwala-archive__item">
                <div class="chwala-archive__image">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="chwala-archive__content">
                    <p class="chwala-archive__content-header"> <?php  the_title(); ?></p>
                    <div class="chwala-archive__content-text"> <?php  the_excerpt();  ?></div>
                    <div class="chwala-archive__content-button">
                        <a href="<?php echo get_permalink(); ?>">  <?php echo get_field('chwala_przekornym_more_button', 'option')  ?></a>
                    </div>

                </div>

            </div>
            <?php     endwhile; ?>


        </div>
        <div class="chwala-archive__pagination">
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