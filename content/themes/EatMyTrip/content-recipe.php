<?php
/**
 * @package brasserie
 * @since brasserie 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="recipe-heading clearfix">
        <div class="recipe-image">
			<?php if ( has_post_thumbnail() ) { ?>
                <a href="<?php the_post_thumbnail_url(); ?>"><?php the_post_thumbnail( 'medium-cropped' ) ?></a>
			<?php } ?>
        </div>
        <div class="recipe-meta">
            <div class="entry-meta">
		        <?php brasserie_posted_on(); ?>
            </div>

            <div class="recipe-excerpt"><?= get_the_excerpt(); ?></div>

            <ul class="recipe-fields">
                <li><span>Serves:</span> <?= get_field( 'serves' ) ?></li>
                <li><span>Duration:</span> <?= get_field( 'duration' ) ?></li>
                <li><span>Difficulty:</span> <?= get_field( 'difficulty' ) ?></li>
            </ul>
        </div>
    </div>
    <div class="recipe-content clearfix">
        <div class="recipe-ingredients">
            <h2><?= __('Ingredients')?></h2>
            <?= get_field( 'ingredients' ) ?>
        </div>

        <div class="entry-content">
            <h2><?= __('Preparation')?></h2>
		    <?php the_content(); ?>
		    <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'brasserie' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
    </div>

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'brasserie' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! brasserie_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( ' Tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brasserie' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brasserie' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'In %1$s &nbsp; Tagged %2$s &nbsp; Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brasserie' );
				} else {
					$meta_text = __( 'In %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brasserie' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'brasserie' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
