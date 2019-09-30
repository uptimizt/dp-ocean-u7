<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>

	<div class="rating-entry-inner">

		<?php
		// If image left
		if ( 'left' == $position ) {
			// Featured Image
			// get_template_part( 'partials/entry/media/blog-entry', $format );
		} ?>

		<div class="blog-entry-content">

            <div class="clr">
            	<h3 class="section-entry-title">
            		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
            	</h3><!-- .blog-entry-title -->
            </div><!-- .blog-entry-header -->
            
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

</div><!-- #post-## -->
