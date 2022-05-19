<?php get_header(); ?>

<div class="search-results__header">
    <h1><?php echo __('Wyniki wyszukiwania dla:')?></h1>
    <h3><?php echo get_query_var('s') ?></h3>
    <div class="search-no-results__container">
        <h5><?php echo __('Brak wyników wyszukiwania')?></h5>
        <p><?php echo __('Wyszukaj ponownie to, czego szukasz')?></p>
        <div class="header__menu-mobilesearch">
                        <div class="header__menu-mobilesearch-button"
                            onclick="document.querySelector('#searchsubmit').click()">

                        </div>
                        <div class="header__menu-mobilesearch-form">
                            <?php get_search_form(); ?>
                        </div>

                    </div>
    </div>
</div>

<?php
$s=get_search_query();



$args = array(
                's' =>$s,
                'post_type'=>'product'
            );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {

    ?> <div class="products__container">
    <h4><?php echo __('Produkty') ?></h4>
    <ul class="products__items"> <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                

   
        wc_get_template_part( 'content', 'product' );





        }
        ?> </ul>
</div><?php
    } 
$args = array(
                's' =>$s,
                'post_type'=>'recipes'
            );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {

    ?> <div class="recipes__container">
    <h4><?php echo __('Przepisy') ?></h4>
    <div class="recipes__items"> <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>

        <div class="recipes__item">
            <div class="recipes__image">
                <?php the_post_thumbnail(); ?>
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


        <?php 


        }
        ?>
    </div>
</div> <?php
    } ?>







<?php
$args = array(
                's' =>$s,
                'post_type'=>'chwalaprzekornym'
                
            );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
 
 ?><div class="chwala-archive__container">
    <h4><?php echo __('Chwała przekornym') ?></h4>
    <div class="chwala-archive__items"> <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                 ?>
        <div class="chwala-archive__item">
            <div class="chwala-archive__image">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="chwala-archive__content">
                <p class="chwala-archive__content-header"> <?php  the_title(); ?></p>
                <div class="chwala-archive__content-text"> <?php  the_excerpt();  ?></div>
                <div class="chwala-archive__content-button">
                    <a href="<?php echo get_permalink(); ?>"> <?php echo __('Więcej') ?></a>
                </div>

            </div>

        </div>




        <?php
        }
        ?>
    </div>
</div> <?php
    } ?>

<?php


$args = array(
                's' =>$s,
                'post_type'=> array( 'page', 'post' )
            );

$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {

    ?> <div class="pages__container">
    <h4><?php echo __('Strony/podstrony') ?></h4>
    <ul class="pages__items"> <?php
        while ( $the_query->have_posts() ) {
           $the_query->the_post();
                
?>
        <a href="<?php echo get_permalink(); ?>"> <?php the_title() ?></a>
        <?php
        }
        ?>
    </ul>
</div><?php
    } ?>


<?php get_footer(); ?>