<?php

namespace Ddrcha\Easyfield\Libraries;


class Easyfield
{
	private $type;
	private $label;
	private $name;
	
	private $note;
	private $data;
	private $class;
	private $additional;
	
	private $required;
	private $value;
	private $width;
	
	private $error;
	
	
	/**
	 * Display a field
	 * $options : config of the field
	 * $item : default object used to complete the value
	 * $errors : errors from validation
	 * @return string $html
	 */
	public function input($options, $item, $errors){
		
		$errorMsg = $this->isValid($options);
		if (!empty($errorMsg)) return $errorMsg."<hr/>";
		
		$template = config('easyfield.templates');
			
		$this->type = $options['type'];
		$this->name = $options['name'];
		$dottedName = str_replace("]", "", $this->name);
		$dottedName = str_replace("[", ".", $dottedName); // 'labelX.labelY' version for arrays
		
		$this->label = (array_key_exists('label', $options)) ? $options['label'] : "";
		$this->data = (array_key_exists('data', $options)) ? $options['data'] : array();
		$this->required = (array_key_exists('required', $options)) ? $options['required'] : false;
		$this->icon = (array_key_exists('icon', $options)) ? $this->getIcon($options['icon']) : "";
		$this->width = (array_key_exists('width', $options)) ? $options['width'] : "12";

		$this->class = (array_key_exists('class', $options)) ? $options['class'] : false;
		$this->template = (array_key_exists('template', $options)) ? $options['template'] : false;
		$this->note = (array_key_exists('note', $options)) ? $options['note'] : false;
		
		if ($errors->has($dottedName)){
			$this->class = ($template == "materialize") ? $this->class." invalid" : $this->class." is-invalid";
			
			$this->error = $errors->first($dottedName);
			
		}else
			$this->error = null;
		
		$this->additional = (array_key_exists('additional', $options)) ? $options['additional'] : array();
		
		if ($this->type == "submit") $this->value = $this->name;
		else{
			$itemValue = (array_key_exists($this->name, $item)) ? $item[$this->name] : ""; // security
			
			if (\Request::old($dottedName)) $this->value = \Request::old($dottedName);
			else if (array_key_exists('value', $options)) $this->value = $options['value'];
			else if (!strpos($this->name, "[]")) $this->value = $itemValue; 
			else $this->value = "";
		}
		
		
		if ($this->template) $template = $this->template;
		else $template = $this->type;
		
		return view('easyfield::'.$template, [
			'label' => $this->label,
			'name' => $this->name,
			'value' => $this->value,
			'class' => $this->class,
			'data' => $this->data,
			'additional' => $this->getOtherAttributes($this->additional),
			'note' => $this->note,
			'icon' => $this->icon,
			'width' => $this->width,
			'error' => $this->error,
			'required' => $this->required
		]);
	}
	
	
	/**
	 * Verify if good params are available for the input type
	 * $options
	 * @return empty if valid, string message if error 
	 */
	
	public function isValid($options){
		
		if (!array_key_exists('type', $options)) return "'options['type'] is required";
		if (!in_array($options['type'], ['text', 'textarea', 'wysiwyg', 'select', 'file', 'radio', 'checkbox', 'submit', 'switch'])) return "options['type'] do not contain a managed value";
		if (!array_key_exists('name', $options)) return "'options['name'] is required";
		
		switch($options['type']){
			case "select" : 
			case "radio" : 
			case "checkbox" : 
				if (!array_key_exists('data', $options)) return "'options['data'] is required";
					
				break;
		}
		
		return "";
	}
	

	/**
	 * Get attributes (html)
	 * $options : array of key / value
	 * @return string 
	 */
	public function getOtherAttributes($additional){
		$formOptions = array();
		
		foreach($additional as $key => $value){
	
			$formOptions[] = $key."=".$value;
			
		}
		
		return implode(" ", $formOptions);
	}
	
	
	/**
	 * Get icon (html)
	 * $label : label
	 * @return string 
	 */
	public function getIcon($label){
		$library = config('easyfield.icons');
		
		if ($library == "materialize") return '<i class="material-icons prefix">'.$label.'</i>';
		else if($library == "fontawesome") return '<i class="'.$label.'"></i>';
		
		return $label;
	}
	
	
}
	
