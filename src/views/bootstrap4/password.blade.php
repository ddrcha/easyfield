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
		<input type="password" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {{ $additional }}>
	
	</div>
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif
</div>