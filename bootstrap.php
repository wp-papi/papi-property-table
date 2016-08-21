<?php

/*
 * Plugin Name: Papi: Property Table
 * Description: Table property for Papi
 * Version: 1.0.0
 * Author: Fredrik Forsmo
 */

/**
 * Include table property.
 */
add_action( 'papi/init', function () {
	include_once __DIR__ . '/class-papi-property-table.php';
} );
