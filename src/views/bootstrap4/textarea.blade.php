<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	
	<div class="input-group">
		@if ($icon)
			 <span class="input-group-addon">{!! $icon !!}</span>
		@endif
		<textarea id="{{ $name }}" name="{{ $name }}" class="form-control {{ $class }}" {{ $additional }}>{{ $value }}</textarea>
	</div>
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif
</div>