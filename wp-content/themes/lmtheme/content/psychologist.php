<article <?php hybrid_attr( 'post' ); ?>>



    <?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>

        <div class="psychologist-profile">
            <div class="row">
                <div class="col-md-3">
                    <div class="pp-image">
                        <?php get_the_image( array( 'size' => 'socially-awkward-large', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array( 'scan_raw', 'scan', 'featured', 'attachment' ) ) ); ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div <?php hybrid_attr( 'entry-content' ); ?>>
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                    <a href="/psychologists/" class="btn btn-primary">view all psychologists</a>

                </div>
            </div>
        </div>



    <?php else : // If not viewing a single post. ?>

        <div class="pyschologist-block">
            <?php get_the_image( array( 'size' => 'socially-awkward-large', 'split_content' => true, 'scan_raw' => true, 'scan' => true, 'order' => array( 'scan_raw', 'scan', 'featured', 'attachment' ) ) ); ?>
            <?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url"><div class="read-plus"></div>', '</a></h2>' ); ?>
        </div>

    <?php endif; // End single post check. ?>



</article><!-- .entry -->