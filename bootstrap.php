<?php

/*
 * Plugin Name: Papi: Table property
 * Description: Table property for Papi
 * Version: 1.0.0
 * Author: Fredrik Forsmo
 * Author URI: https://frozzare.com
 * Plugin URI: https://github.com/wp-papi/papi-property-table
 */

/**
 * Include table property.
 */
add_action( 'papi/init', function () {
	include_once __DIR__ . '/class-papi-property-table.php';
} );
