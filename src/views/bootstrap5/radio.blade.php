<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">{{ $label }}</label>
	
	<div class="input-group">
		@foreach ($data as $dataValue => $dataLabel)
		
			@if ($value == $dataValue) 
				<input type="radio" name="{{ $name }}" value="{{ $dataValue }}" selected="selected">{{ $dataLabel }}</option>
			@else  
				<input type="radio" name="{{ $name }}" value="{{ $dataValue }}">{{ $dataLabel }}</option>
			@endif	
		@endforeach
			
		@if ($error)
			<span class="invalid-error">{{ $error }}</span>
		@endif
		@if ($note)
			<div class="note">{{ $note }}</div>
		@endif
	</div>
</div>