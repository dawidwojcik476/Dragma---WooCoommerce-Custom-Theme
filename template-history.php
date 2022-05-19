<?php
/*
Template Name: Historia
Template Post Type: post, page, event
*/?>

<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<section class="main history">

<?php the_content(); ?>
<?php if (get_field('history_image')): ?>
<div class="history__image">
<?php $image =  get_field('history_image') ?>
            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
</div>
<?php endif;?>

</section>


<?php get_footer(); ?>