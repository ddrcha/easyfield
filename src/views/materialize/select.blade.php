<div class="input-field col s12 l{{ $width }}">
	<select id="{{ $name }}" name="{{ $name }}" class="validate {{ $class }} js-select" {{ $additional }}>
		@foreach ($data as $dataValue => $dataLabel)
			@php
				$selected = false;
				if (is_array($value) && in_array($dataValue, $value)) $selected = true;
				else if ($value == $dataValue) $selected = true;
			@endphp
			
			@if($selected)	
				<option value="{{ $dataValue }}" selected="selected">{{ $dataLabel }}</option>
			@else  
				<option value="{{ $dataValue }}">{{ $dataLabel }}</option>
			@endif	
		@endforeach
	</select>
	
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	@if ($error)
		<span class="red-text text-darken-1">{{ $error }}</span>
	@endif
	@if ($note)
		<span class="helper-text note">{{ $note }}</span>
	@endif
</div>