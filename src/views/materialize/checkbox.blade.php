<div class="input-field col s12 l{{ $width }}">
	<label for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	@foreach ($data as $dataValue => $dataLabel)
		@if ($value == $dataValue) 
			<input type="checkbox" name="{{ $name }}" value="{{ $dataValue }}" selected="selected">{{ $dataLabel }}</option>
		@else  
			<input type="checkbox" name="{{ $name }}" value="{{ $dataValue }}">{{ $dataLabel }}</option>
		@endif	
	@endforeach
		
	@if ($error)
		<span class="red-text text-darken-1">{{ $error }}</span>
	@endif
	@if ($note)
		<div class="note">{{ $note }}</div>
	@endif
</div>