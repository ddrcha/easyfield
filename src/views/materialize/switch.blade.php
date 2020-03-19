<div class="input-field col s12 l{{ $width }}">
	<div class="switch">
		<label>
			{{ $label }}
			@if ($required)
				<span class="required">*</span>
			@endif	
			&nbsp;&nbsp;&nbsp;
			Non
			<input type="checkbox" name="{{ $name }}" 
				@if($value) checked="checked" @endif
			>
			<span class="lever"></span>
			Oui
		</label>
			
		@if ($note)
			<span class="helper-text note">{{ $note }}</span>
		@endif
		@if ($error)
			<span class="red-text text-darken-1">{{ $error }}</span>
		@endif
	</div>

</div>