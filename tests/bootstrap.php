<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../wp-widget-disable.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

class WP_Widget_Disable_TestCase extends WP_UnitTestCase {
	function plugin() {
		return WP_Widget_Disable_Plugin::get_instance();
	}

	function set_post( $key, $value ) {
		$_POST[ $key ] = $_REQUEST[ $key ] = addslashes( $value );
	}

	function unset_post( $key ) {
		unset( $_POST[ $key ], $_REQUEST[ $key ] );
	}
}
