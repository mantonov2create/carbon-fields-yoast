<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make( 'theme_options', __( 'Yoast Options', 'crb' ) )
	->set_page_file( 'crbn-yoast-options.php' )
	->set_page_menu_position( 100 )
	->set_icon( 'dashicons-admin-site-alt2' )
	->add_fields(  array(
		Field::make( 'text', 'crb_yoast_content_class', __( 'Class Name of the Content\'s wrapper', 'crb' ) )
			->set_default_value( 'main' ),
	) );
