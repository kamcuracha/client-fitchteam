var elixir = require('laravel-elixir');

elixir((mix) => {
	mix
	.sass('main.scss', 'assets/styles/main.css', 'assets/scss')
	.scripts([
		'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
		'assets/scripts/plugins/singlePageNav.js',
		'assets/scripts/plugins/appear.js',
		'assets/scripts/plugins/dotimeout.js',
		'assets/scripts/main.js',
	], 'assets/scripts/all.js', './')
});
