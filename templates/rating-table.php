<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$product = wc_get_product();
?>

<div id="post-<?php the_ID(); ?>" >

	<div class="rating-entry-row">
		
		<div class="item-meta-wrapper">
			<div class="item-img">
				<?= $product->get_image( 'woocommerce_thumbnail' ) ?>
			</div>

			<div class="item-meta">
		
				<header>
					<h3 class="item-entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3><!-- .blog-entry-title -->
				</header>
				<?php if($product->get_average_rating()): ?>
                    <div class="dp-rating-block">
                        <span class="dp-rating-block--count">
                            <?= $product->get_review_count() ?>
                            <?= sprintf('<img src="%s" width="22" height="22">', plugins_url('../assets/comments.svg', __FILE__)); ?>
                        </span>
                        <span class="dp-rating-block--avg">
                            <span class="rating-avg"><?= $product->get_average_rating() ?></span>
                            <span><?= wc_get_rating_html($product->get_average_rating());  ?></span>
                        </span>

                    </div>
				<?php endif; ?>
				<div class="item-description">
					<span><?= $product->get_short_description() ?></span>
				</div>
			</div>
		
		</div>

		<div class="item-actions">

			<div class="readmore wp-block-button aligncenter is-style-squared">
				<a href="<?= $product->get_permalink() ?>" class="wp-block-button__link" rel="noopener noreferrer">Обзор</a>
			</div>

			<div class="site-link wp-block-button aligncenter is-style-squared">
				<a href="<?= $product->get_permalink() . 'gurl/' ?>" class="wp-block-button__link" target="_blank" rel="noopener noreferrer">Сайт</a>
			</div>

		</div><!-- .blog-entry-content -->

	</div><!-- .blog-entry-inner -->

</div><!-- #post-## -->
