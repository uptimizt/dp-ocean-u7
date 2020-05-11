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

$is_singular_start = $GLOBALS['wp_query']->is_singular;

$GLOBALS['wp_query']->is_singular = false;
$GLOBALS['wp_query']->is_single = false;


// Get post format
$format = get_post_format();
// Add classes to the blog entry post class
$classes = oceanwp_post_entry_classes();
// Inner classes
$inner_classes = array();
// Image position
$position = get_theme_mod( 'ocean_blog_thumbnail_image_position', 'left' );
$position = $position ? $position : 'left';
$inner_classes[] = $position . '-position';
// Vertical postion
$ver_position = get_theme_mod( 'ocean_blog_thumbnail_vertical_position', 'center' );
$ver_position = $ver_position ? $ver_position : 'center';
$inner_classes[] = $ver_position;
// Turn inner classes into space seperated string
$inner_classes = implode( ' ', $inner_classes ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<div class="blog-entry-inner clr <?php echo esc_attr( $inner_classes ); ?>">

		<?php
		// If image left
		if ( 'left' == $position ) {
			// Featured Image
			// get_template_part( 'partials/entry/media/blog-entry', $format );
		} ?>

		<div class="blog-entry-content">

			<?php
			// Category
			// get_template_part( 'partials/entry/thumbnail-style/category' );

			// Title
            do_action( 'ocean_before_blog_entry_title' ); ?>
            <header class="clr">
            	<h3 class="section-entry-title">
            		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
            	</h3><!-- .blog-entry-title -->
            </header><!-- .blog-entry-header -->
            <?php do_action( 'ocean_after_blog_entry_title' );

			// Content
			get_template_part( 'partials/entry/content' ); ?>

			<div class="blog-entry-bottom clr">

				<?php
                get_template_part( 'partials/entry/readmore' ); 
				// Comments
				// get_template_part( 'partials/entry/thumbnail-style/comments' );
				// Date
				// get_template_part( 'partials/entry/thumbnail-style/date' ); ?>

			</div><!-- .blog-entry-bottom -->

		</div><!-- .blog-entry-content -->

		<?php
		// If image right
		if ( 'right' == $position ) {
			// Featured Image
			get_template_part( 'partials/entry/media/blog-entry', $format );
		} ?>

	</div><!-- .blog-entry-inner -->

</article><!-- #post-## -->
<?php 

$GLOBALS['wp_query']->is_singular = $is_singular_start;
$GLOBALS['wp_query']->is_single = $is_singular_start;


