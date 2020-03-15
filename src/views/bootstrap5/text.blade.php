<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">{{ $label }}</label>
	
	<div class="input-group">
		@if ($icon)
			 <span class="input-group-addon">{!! $icon !!}</span>
		@endif
		<input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}" {{ $additional }}>
		
		@if ($error)
			<span class="invalid-error">{{ $error }}</span>
		@endif
		@if ($note)
			<div class="note">{{ $note }}</div>
		@endif
	</div>
</div>