<?php 
/**
 * Template Name: Formats
 */

get_header(); // Loads the header.php template. ?>
<main <?php hybrid_attr( 'content' ); ?>>

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>

	<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

		<?php locate_template( array( 'misc/banner.php' ), true ); // Loads the misc/loop-meta.php template. ?>

		<div class="main-content">
			<div class="container">
			<?php the_post(); // Loads the post data. ?>

				<?php if ( hybrid_post_has_content() ) : // Check if the page has content. ?>

					<div class="content-holder copy">
						<div <?php hybrid_attr( 'entry-content' ); ?>>
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div>

				<?php else : // If the page doesn't have content. ?>

					<?php // hybrid_get_menu( 'formats' ); // Loads the menu/formats.php template ?>

				<?php endif; // End check for page content. ?>

			</div>
		</div>

	<?php endwhile; // End found posts loop. ?>

	<?php endif; // End check for posts. ?>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>