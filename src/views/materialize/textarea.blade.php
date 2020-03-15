<div class="input-field col s12 l{{ $width }}">
	@if ($icon)
		{!! $icon !!}
	@endif
	<textarea id="{{ $name }}" name="{{ $name }}" class="validate {{ $class }}" {{ $additional }}>{{ $value }}</textarea>
	<label for="{{ $name }}">{{ $label }}</label>
	@if ($error)
		<span class="red-text text-darken-1">{{ $error }}</span>
	@endif
	@if ($note)
		<div class="note">{{ $note }}</div>
	@endif
</div>