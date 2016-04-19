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

elixir(function(mix) {
		mix.sass('dashboard.scss')
			.scripts(['dashboard_v1/jquery.min.js', 'dashboard_v1/hris_get_view.js', 
						'dashboard_v1/hris_submit.js', 'dashboard_v1/hris_menu.js', 
						'dashboard_v1/hris_modal.js', 'dashboard_v1/hris_slimscroll.js',
						'dashboard_v1/hris_filter.js', 'dashboard_v1/hris_select_2.js',
						'dashboard_v1/hris_wizard.js', 'dashboard_v1/hris_ajax_generate_something.js',
						'dashboard_v1/hris_tree.js',
						'dashboard_v1/bootstrap.min.js'
					], 'public/js/dashboard.js')
		.version(['public/css/dashboard.css',
				'public/js/dashboard.js'
				])
		.copy('resources/assets/plugins/', 'public/plugins/');
});
