<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>


<?php wp_nav_menu(
	array(
		'theme_location'  => 'secondary'
	)
); ?>

<?php endif; // End check for menu. ?>