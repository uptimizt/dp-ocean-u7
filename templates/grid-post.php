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

// Get post format
$format = get_post_format();
// Add classes to the blog entry post class
$classes = oceanwp_post_entry_classes();
// Inner classes
$inner_classes = [
    ''
];

$inner_classes = implode( ' ', $inner_classes ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<div class="grid-entry-inner clr <?php echo esc_attr( $inner_classes ); ?>">

		<?php
        // get_template_part( 'partials/entry/media/blog-entry', $format )
        ?>
        <div class="thumbnail-post-grid">
            <a href="<?php the_permalink(); ?>" class="thumbnail-link">
                <?php the_post_thumbnail('medium'); ?>
            </a>
        </div>

		<div class="grid-entry-content">

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
			// get_template_part( 'partials/entry/content' );
            ?>
            <?php
            do_action( 'ocean_before_blog_entry_content' );

            ?>

            <div class="blog-entry-summary clr">
                <p>
                    <?php
                    // Display custom excerpt
                    // echo oceanwp_excerpt( get_theme_mod( 'ocean_blog_entry_excerpt_length', '30' ) );
                    the_excerpt();
                    ?>
                </p>

                <?php
                // Display excerpt
                if ( '500' != get_theme_mod( 'ocean_blog_entry_excerpt_length', '30' ) ) : ?>


                <?php
                // If excerpts are disabled, display full content
                else :
                    the_content( '', '&hellip;' );
                endif; ?>

            </div><!-- .blog-entry-summary -->

            <?php do_action( 'ocean_after_blog_entry_content' ); ?>

			<div class="blog-entry-bottom clr">

				<?php
                get_template_part( 'partials/entry/readmore' );
				// Comments
				// get_template_part( 'partials/entry/thumbnail-style/comments' );
				// Date
				// get_template_part( 'partials/entry/thumbnail-style/date' ); ?>

			</div><!-- .blog-entry-bottom -->

		</div><!-- .blog-entry-content -->


	</div><!-- .blog-entry-inner -->

</article><!-- #post-## -->
