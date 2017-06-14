<?php get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<?php locate_template( array( 'misc/banner.php' ), true ); // Loads the misc/loop-meta.php template. ?>
	<?php if( is_singular('post') ) : ?>

        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#"><?php the_title(); ?></a>
                </li>
            </ul>

            <div class="page-content-heading">
                <a href="<?php echo get_page_link(11); ?>" class="btn btn-primary btn-gray btn-sm">Back to Blog</a>
            </div>

    <?php else: ?>

        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
            </ul>

    <?php endif; ?>

    <div class="page-copy">

        <?php if ( have_posts() ) : // Checks if any posts were found. ?>

            <?php while ( have_posts() ) : // Begins the loop through found posts. ?>

                <?php the_post(); // Loads the post data. ?>

                <div class="post-inline">
                    <?php hybrid_get_content_template(); // Loads the content/*.php template. ?>
                </div>

                <?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

                    <?php comments_template( '', true ); // Loads the comments.php template. ?>

                <?php endif; // End check for single post. ?>

            <?php endwhile; // End found posts loop. ?>

            <?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>

        <?php else : // If no posts were found. ?>

            <?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

        <?php endif; // End check for posts. ?>

	</div>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>