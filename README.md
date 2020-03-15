# Laravel - Easyfield
My little input builder for Laravel 6 and more

### Installation ###

First install the package via composer 

```
composer install ddrcha/easyfield
```

Then set reference to the package in adding two lines in your config/app.php file : 

```
'providers' => [
	...
	Ddrcha\Easyfield\EasyfieldServiceProvider::class,
],

 'aliases' => [
	...
	'Easyfield' => Ddrcha\Easyfield\Facades\Easyfield::class,
],
```

### Customisation ###

Easyfield integrates templates for Bootstrap 5 / Font Awesome (by default) and Materialize.
If you want to change the configuration you must publish it with this command line : 

```
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=config
```

A new file named easyfield.php will be added into your "[project]/config" folder (containing two options, "templates" and "icons").

It's also possible to edit templates with one of these command lines : 

```
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=bootstrap5
OR
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=materialize
```

All templates (one by input type) become so available in your "[project]/resources/views/vendor/easyfield" folder !


### Usage ###

Don't forget to include libraries you want to use (Bootstrap 5, Materialize, etc...) in your view before using Easyfield.

An example for displaying an input field : 
```
@php
	// ---- city of the user
	$input = array(
		'type' => 'select',
		'name' => 'city',
		'label' => 'City',
		'data' => $cities,
		'additional' => [
			'data-country' => 'FR' 
		]
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}				
```
('$item' corresponds to the main eloquent object used to complete the form, and "$errors" to the facultative returns of validation form).

The 'type' option is the most important, and you can set 9 values : 'text', 'textarea', 'wysiwyg', 'select', 'file', 'radio', 'checkbox', 'submit' (button) or 'switch'.

All available options in the detail : 

| Option | Required | Description |
| --- | --- | --- |
| type | X | String. 'type=' of the field.  |
| name | X | String. 'name=' of the field |
| label |  | String. Label before the input |
| required |  | String. display * before label if 'true', 'false' by default |
| width |  | Integer. size of the field (in 12 grid columns layout). '12' by default |
| class |  | String. Additional classes spent to the input field |
| data | x (only for 'select' type) | Array collection. |
| note |  | String. Display a small information after field |
| value |  | String. If you want to set a particular value by default |
| additional |  | Associative Array (key => value). Add additional attributes to the input field ! |

Some examples coming soon !