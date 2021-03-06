<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	
	<div class="input-group">
		@foreach ($data as $dataValue => $dataLabel)
		
			@if ($value == $dataValue) 
				<input type="checkbox" name="{{ $name }}" value="{{ $dataValue }}" selected="selected">{{ $dataLabel }}</option>
			@else  
				<input type="checkbox" name="{{ $name }}" value="{{ $dataValue }}">{{ $dataLabel }}</option>
			@endif	
		@endforeach
		
	</div>
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif
	
</div>