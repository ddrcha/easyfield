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
		<input type="file" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {{ $additional }}>

		@if ($note)
			<div class="note">{{ $note }}</div>
		@endif
		@if ($error)
			<span class="invalid-error">{{ $error }}</span>
		@endif
	</div>
</div>