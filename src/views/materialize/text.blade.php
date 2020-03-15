<div class="input-field col s12 l{{ $width }}">
	@if ($icon)
		{!! $icon !!}
	@endif
	<input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="validate {{ $class }}" {{ $additional }}>
	<label for="{{ $name }}">{{ $label }}</label>
	@if ($error)
		<span class="red-text text-darken-1">{{ $error }}</span>
	@endif
	@if ($note)
		<div class="note">{{ $note }}</div>
	@endif
</div>