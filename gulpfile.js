var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix){
	mix.styles([
		'*.css',
		'../../bower_components/ekko-lightbox/dist/ekko-lightbox.css'
	], 'public/build/css/portfolio.css')
		.scripts([
			'../../bower_components/jquery/dist/jquery.js',
			'../../bower_components/bootstrap/dist/js/bootstrap.js',
			'../../bower_components/ekko-lightbox/dist/ekko-lightbox.js',
			'*.js'
		], 'public/build/js/portfolio.js')
		.copy('resources/bower_components/bootstrap/dist/fonts', 'public/build/fonts');
});