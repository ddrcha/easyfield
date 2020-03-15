<div class="input-field col s12 l{{ $width }}">
	<label class="col s1">{{ $label }}</label>
	<div class="col s11">
		@foreach ($data as $dataValue => $dataLabel)
		
			@if ($value == $dataValue) 
				<input type="radio" name="{{ $name }}" value="{{ $dataValue }}" selected="selected">{{ $dataLabel }}</option>
			@else  
				<input type="radio" name="{{ $name }}" value="{{ $dataValue }}">{{ $dataLabel }}</option>
			@endif	
		@endforeach
			
		@if ($error)
			<span class="red-text text-darken-1">{{ $error }}</span>
		@endif
		@if ($note)
			<div class="note">{{ $note }}</div>
		@endif
	</div>
</div>