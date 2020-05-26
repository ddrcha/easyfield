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

Easyfield integrates by default templates for Bootstrap 5 and Materialize.

You must publish one of them to use the package : 

```
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=bootstrap4
OR
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=materialize
```

All templates (one by input type) become so available in your "[project]/resources/views/vendor/easyfield" folder. You are free to modify it and add others views (that you can set with "template" option).


## Icons ##

By default Easyfield use Font Awesome icons. If you want to use materialize icons, you must publish config file and modify the "icons" variable : 

```
php artisan vendor:publish --provider="Ddrcha\Easyfield\EasyfieldServiceProvider" --tag=config
```

(A file named "easyfield.php" will be added into your "[project]/config" folder).



## Usage ##

Don't forget to include libraries you want to use (Bootstrap 5, Materialize, Datepicker, Select2, Font Awesome, etc...) in your view before using Easyfield.

### The syntax ###

To display a field use this syntax : 
```
{!! \Easyfield::input($input, $item, $errors) !!}
// $input (array) : All configuration options
// $item  (eloquent object) : main object used to complete the form
// $errors (array) : optional returns of validation form.
```

All available options in the detail : 

| Option | Required | Description |
| --- | --- | --- |
| type | X | String. 'type=' of the field. Possible values : 'text', 'password', 'textarea', 'select', 'file', 'radio', 'checkbox', 'submit' (button), 'switch' |
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

Nota : For a best rendering insert all your fields into tags (if you use Bootstrap 4).
```
<div class="form-row"></div>
```

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


#### Password ####

```
// In your blade template
@php
	// ---- title
	$input = array(
		'type' => 'password',
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

#### Wysiwyg (via ckeditor 5) ####
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
	// ---- editors
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
