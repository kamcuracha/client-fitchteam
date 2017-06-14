<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>
	<?php wp_nav_menu(
		array(
			'theme_location'  => 'primary',
			'container'       => '',
			'depth'             => 2,
			'menu_id'         => 'menu-primary',
			'menu_class'        => 'nav navbar-nav navbar-left',
			'fallback_cb'     => '',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			'walker'            => new wp_bootstrap_navwalker()
		)
	); ?>

<?php endif; // End check for menu. ?>
