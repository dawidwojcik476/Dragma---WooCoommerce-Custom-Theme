<?php

/**
 * Złoty Cytat Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'golden-quote-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'golden-quote';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$content = get_field('golden-quote_content');


?>
<div id="<?php echo esc_attr($id); ?>"
    class="<?php echo esc_attr($className); ?>">
    <div class="golden-quote">
     
        <?php echo $content ?>

    </div>

</div>