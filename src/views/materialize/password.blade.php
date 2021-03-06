<div class="input-field col s12 l{{ $width }}">
	@if ($icon)
		{!! $icon !!}
	@endif
	<input type="password" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="validate {{ $class }}" {{ $additional }}>
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	
	@if ($note)
		<span class="helper-text note">{{ $note }}</span>
	@endif
	@if ($error)
		<span class="red-text text-darken-1">{{ $error }}</span>
	@endif
	
</div>