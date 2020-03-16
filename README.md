# Laravel - Easyfield
My little input builder for Laravel 6 and more

## Installation ##

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

## Customization ##

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


## Usage ##

Don't forget to include libraries you want to use (Bootstrap 5, Materialize, Datepicker, Select2, etc...) in your view before using Easyfield.

### The syntax ###

To display a field use this syntax : 
```
{!! \Easyfield::input($input, $item, $errors) !!}
// $input (array) : All configuration options
// $item  (eloquent collection) : main object used to complete the form
// $errors (array) : optional returns of validation form.
```

All available options in the detail : 

| Option | Required | Description |
| --- | --- | --- |
| type | X | String. 'type=' of the field. Possible values : 'text', 'textarea', 'select', 'file', 'radio', 'checkbox', 'submit' (button), 'switch' |
| name | X | String. 'name=' of the field |
| label |  | String. Text displayed before the input |
| required |  | String. Display * before label if 'true', 'false' by default |
| icon |  | String. Add icon before field. The used library can be setted in config file |
| class |  | String. Additional classes spent to the input field |
| width |  | Integer. Size of the field (in 12 grid columns layout). '12' by default |
| data | X (only for 'select' type) | Eloquent collection |
| note |  | String. Display a small information after field |
| value |  | String. If you want to set a particular value by default |
| additional |  | Associative Array (key => value). Add all additional attributes you need ! |
| template |  | String. Use a custom template file (ex : "text2" will use "resources\views\vendor\easyfield\text2.blade.php") |

### Simple examples ###

#### Text ####

```
// In your blade template
@php
	// ---- title
	$input = array(
		'type' => 'text',
		'name' => 'title',
		'label' => 'Title of post',
		'required' => true
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}		
```

#### File ####

```
// In your blade template
@php
	// ---- avatar
	$input = array(
		'type' => 'file',
		'name' => 'avatar',
		'label' => 'User avatar',
		'icon' => 'fas fa-file',
		'note' => 'The photo must be a png or jpg file.'
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}		
```

#### Select ####

```
// In your controller
$data['categories'] = \App\Models\Category::pluck('title', 'id'); // to spend in your view

// In your blade template
@php
	// ---- category_id
	$input = array(
	'type' => 'select',
		'name' => 'category_id',
		'label' => 'Main category',
		'data' => $categories
	);
@endphp
{!! \Easyfield::input($input, $selected, $errors) !!}
```


### Advanced examples ###

#### Wysiwig (via ckeditor 5) ####
```
// In your blade template
@php
	// ---- content
	$input = array(
		'type' => 'text',
		'name' => 'content',
		'label' => 'Content of post',
		'class' => 'js-wysiwyg' 
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}	

// in your .js file
if ($('.js-wysiwyg').length){
	var allEditors = document.querySelectorAll('.js-wysiwyg');
		
	for (var i = 0; i < allEditors.length; ++i) {
		
		ClassicEditor
		.create(
			allEditors[i], ...
		);
	}
}
```

#### Date Picker (via jquery DatePicker) ####
```
// In your blade template
@php
	// ---- birthdate
	$input = array(
		'type' => 'text',
		'name' => 'birthdate',
		'label' => 'Date of birth',
		'class' => 'js-datepicker' 
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}	

// in your .js file
if ($('.js-datepicker').length){
	$('.js-datepicker').datepicker();
}
```

#### Multi select (via select2) ####
```
// In your controller
$data['editors'] = \App\Models\Editor::pluck('title', 'id'); // to spend in your view
$selectedEditors = array();
foreach($item->editors as $editor){
	$selectedEditors[] = $editor->id;
}
$data['selectedEditors'] = $selectedEditors:

// In your blade template
@php
	// ---- headline of post
	$input = array(
		'type' => 'select',
		'name' => 'editors[]',
		'label' => 'Editors',
		'data' => $editors,
		'class' => 'js-multiple-select',
		'value' => $selectedEditors, // array to set default values
		'additional' => ['multiple' => 'multiple'] // attribute required by select2
	);
@endphp
{!! \Easyfield::input($input, $item, $errors) !!}	

// in your .js file
if ($('.js-multiple-select').length){
	$('.js-multiple-select').select2();
}

```
