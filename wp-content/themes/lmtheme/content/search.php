<article <?php hybrid_attr( 'post' ); ?>>
    <?php twentyfifteen_post_thumbnail(); ?>

    <div <?php hybrid_attr( 'entry-content' ); ?>>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div><!-- .entry-content -->

    <div <?php hybrid_attr( 'entry-content' ); ?>>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link(); ?>
    </footer><!-- .entry-footer -->

    <?php if ( 'post' == get_post_type() ) : ?>

        <footer class="entry-footer">
            <?php twentyfifteen_entry_meta(); ?>
            <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-footer -->

    <?php else : ?>

        <?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

    <?php endif; ?>

</article><!-- #post-## -->
