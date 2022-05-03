<?php

namespace Carbon_Fields_Yoast;

class Carbon_Fields_Yoast {
	/**
	 * Constructor.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function __construct() {
		if ( ! class_exists( 'Carbon_Fields\\Carbon_Fields' ) ) {
			return;
		}

		require_once dirname(__DIR__) . '/config.php';

		add_action( 'admin_print_footer_scripts', array( $this, 'enqueue_assets' ), 8 );
		add_action( 'carbon_fields_register_fields', array( $this, 'attach_theme_options' ), 8 );
	}

	/**
	 * Enqueues the assets.
	 *
	 * @access public
	 *
	 * @return void
	 */
	public function enqueue_assets() {
		$isDevelopment = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG;

		wp_enqueue_script(
			'carbon-fields-yoast',
			\Carbon_Fields_Yoast\URL . '/dist/carbon-fields-yoast' . ($isDevelopment ? '' : '.min') . '.js',
			array( 'carbon-fields-core' ),
			\Carbon_Fields_Yoast\VERSION,
			true
		);

		if ( ! empty( $content_class = carbon_get_theme_option( 'crb_yoast_content_class' ) ) ) {
			wp_localize_script( 'carbon-fields-yoast', 'crbnyoast', array(
				'class' => $content_class,
			) );
		}
	}

	public function attach_theme_options() {
		include_once( \Carbon_Fields_Yoast\DIR . '/options/theme-options.php' );
	}
}
