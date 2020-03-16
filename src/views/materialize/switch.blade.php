<div class="input-field col s12 l{{ $width }}">
	<label class="col s1" for="{{ $name }}">
		{{ $label }}
		@if ($required)
			<span class="required">*</span>
		@endif	
	</label>
	<div class="col s11">
		<div class="switch">
			<label>
				Non
				<input type="checkbox" name="{{ $name }}" 
					@if($value) checked="checked" @endif
				>
				<span class="lever"></span>
				Oui
			</label>
				
			@if ($error)
				<span class="red-text text-darken-1">{{ $error }}</span>
			@endif
			@if ($note)
				<div class="note">{{ $note }}</div>
			@endif
		</div>
	</div>
</div>