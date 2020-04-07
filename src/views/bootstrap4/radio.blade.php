<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	
	<div class="input-group">
		@foreach ($data as $dataValue => $dataLabel)
			
			<div class="form-check form-check-inline">
				 @if ($value == $dataValue) 
					<input type="radio" name="{{ $name }}" id="{{ strtolower($dataLabel) }}" value="{{ $dataValue }}" selected="selected">
				@else  
					<input type="radio"  name="{{ $name }}" id="{{ strtolower($dataLabel) }}" value="{{ $dataValue }}">
				@endif	

				 <label class="form-check-label" for="{{ strtolower($dataLabel) }}">{{ $dataLabel }}</label>
			</div>
		@endforeach
	</div>
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif
</div>