<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	
	<div class="input-group">
				
		<select id="{{ $name }}" name="{{ $name }}" class="form-control {{ $class }} js-select" {{ $additional }}>
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
	</div>
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif
</div>