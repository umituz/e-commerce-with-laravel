<?php

return [

	/*
    |--------------------------------------------------------------------------
    | Default tax rate
    |--------------------------------------------------------------------------
    |
    | This default tax rate will be used when you make a class implement the
    | Taxable interface and use the HasTax trait.
    |
    */

	'tax' => 18,

	/*
	|--------------------------------------------------------------------------
	| card database settings
	|--------------------------------------------------------------------------
	|
	| Here you can set the connection that the card should use when
	| storing and restoring a card.
	|
	*/

	'database' => [
		'connection' => null,
		'card' => [
			'identity' => 'id',
			'baseTable' => 'cards',
			'relatedColumn' => 'card_id'
		],
		'card_details' => [
			'identity' => 'id',
			'baseTable' => 'card_details',
			'numberColumn' => 'adet',
			'priceColumn' => 'fiyat',
			'statusColumn' => 'durum',
		],
		'product' => [
			'identity' => 'id',
			'baseTable' => 'urun',
			'relatedColumn' => 'urun_id'
		],
		'user' => [
			'identity' => 'id',
			'baseTable' => 'kullanici',
			'relatedColumn' => 'kullanici_id'
		]
	],

	/*
	|--------------------------------------------------------------------------
	| Destroy the cart on user logout
	|--------------------------------------------------------------------------
	|
	| When this option is set to 'true' the cart will automatically
	| destroy all cart instances when the user logs out.
	|
	*/

	'destroy_on_logout' => false,

	/*
	|--------------------------------------------------------------------------
	| Default number format
	|--------------------------------------------------------------------------
	|
	| This defaults will be used for the formated numbers if you don't
	| set them in the method call.
	|
	*/

	'format' => [
		'decimals' => 2,
		'decimal_point' => '.',
		'thousand_seperator' => ','
	],

];
