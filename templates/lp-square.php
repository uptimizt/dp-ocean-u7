<?php

/**
 * Default post entry layout
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

$post = get_post();
$classes = 'nicePostList__card nicePostList__item_id_' . $post->ID;

// $img_sizes = get_intermediate_image_sizes();
?>


<div <?php post_class($classes); ?>>
    <a href="<?php the_permalink(); ?>" class="nicePostList__postUrl">
        <div class="nicePostList__cardWrapper">
            <figure class="nicePostList__cardImg" style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?>)">
            </figure>

            <div class="nicePostList__cardImgOverlay"></div>
            <div class="nicePostList__cardTitle">
                <div class="nicePostList__postMeta">
                    <span>Статьи</span>
                </div>
                <h2 class="nicePostList__cardTitleText">
                    <span><?php the_title(); ?></span>
                </h2>
            </div>
        </div>
    </a>
</div>



</article><!-- #post-## -->