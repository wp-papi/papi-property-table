# Papi - Table property

Table property for Papi.

## Installation

This property requires [Papi](https://wp-papi.github.io/) plugin.

If you're using Composer to manage WordPress, add Papi to your project's dependencies. Run:

```sh
composer require frozzare/papi-property-table
```

## Usage

```php
<?php

$fields = [
    ['Name', 'facility_name'],
    ['ID', 'facility_id'],
    ['Location', 'facility_location_name'],
    ['E-email', 'facility_email'],
    ['Address', 'facility_street_address'],
    ['Zip code', 'facility_zip_code']
];

foreach ( $fields as $k => $v ) {
    $fields[$k][1] = get_post_meta( $_GET['post'], $v[1], true );
}

$this->box( [
    'title'   => 'Facility information',
    'context' => 'side'
], [
    papi_property( [
        'sidebar'  => false,
        'title'    => 'Facility information',
        'type'     => 'table',
        'settings' => [
            'items' => $fields
        ]
    ] )
] );
```

## License

MIT © [Fredrik Forsmo](https://github.com/frozzare)
