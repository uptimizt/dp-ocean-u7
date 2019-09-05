<?php
/**
 * Default post entry layout
 *
 * @package OceanWP WordPress theme
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add classes to the blog entry post class
$classes = [

];
// Inner classes
$inner_classes = [

];
// Turn inner classes into space seperated string
$inner_classes = implode( ' ', $inner_classes ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="blog-entry-inner clr <?php echo esc_attr( $inner_classes ); ?>">
		<div class="blog-entry-content">
			<?php
			// Title
            do_action( 'ocean_before_blog_entry_title' ); ?>
            <header class="clr">
            	<h3 class="section-entry-title">
            		<?php the_title(); ?>
            	</h3><!-- .blog-entry-title -->
            </header><!-- .blog-entry-header -->
            <?php do_action( 'ocean_after_blog_entry_title' ); ?>
            <p><?php the_excerpt(); ?></p>
		</div><!-- .blog-entry-content -->
        <p>Подробнее: <?= sprintf('<a href="%1$s">%1$s</a>', get_the_permalink()) ?></p> 
	</div><!-- .blog-entry-inner -->
</article><!-- #post-## -->
