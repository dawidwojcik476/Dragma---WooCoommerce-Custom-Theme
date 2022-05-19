<?php get_header(); ?>


<section class="main chwala">

<div class="chwala__image">
<?php $icon =  get_field('chwala_image') ?>
                    <img src="<?php echo esc_url($icon['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($icon['alt']); ?>" />


                        <div class="chwala__info">
                            <div class="chwala__info-date">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/awesome-calendar-alt.webp" alt="Date">
                                <p><?php echo get_the_date( 'd.m.Y' );?></p>
                            </div> 
                             <div class="chwala__info-hour">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/feather-clock.webp" alt="Date">
                                <p><?php echo get_the_date( 'g:i' );?></p>
                            </div> 
                             <div class="chwala__info-author">
                                <img src="<?php echo get_template_directory_uri(); ?>/public/images/material-person.webp" alt="Date">
                                <p><?php echo get_the_author(); ?></p>
                            </div>
                        </div>
</div>
<div class="chwala__content">
<?php the_content()?>
</div>
	
<div class="chwala__button">
<a href="<?php echo get_post_type_archive_link( 'chwalaprzekornym' ); ?>">   <?php echo get_field('chwala_przekornym_back_button', 'option')  ?></a>
</div>
	
 
</section>

<?php
$data= new WP_Query(array(
    'post_type' => 'chwalaprzekornym',
    'numberposts' => 3,
    'posts_per_page' => 3,
    'suppress_filters' => false
));?>

<section class="recipes">
    <h1><?php echo get_field('chwala_przekornym_got_thema', 'option')  ?></h1>
    <div class="recipes__container">
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

        <?php endif; ?>

        <?php wp_reset_postdata();?>


    </div>

</section>




<?php get_footer(); ?>