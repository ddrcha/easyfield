<div class="form-group col-12 col-sm-{{ $width }}">
	<label for="{{ $name }}">{{ $label }}</label>
	
	<div class="input-group">
		<div class="custom-control custom-switch">
			<input type="checkbox" name="{{ $name }}" class="custom-control-input" id="{{ $name }}"
					@if($value) checked="checked" @endif
				>
			<label class="custom-control-label" for="{{ $name }}">{{ $label }}</label>
				
			@if ($error)
				<span class="invalid-error">{{ $error }}</span>
			@endif
		
			@if ($note)
				<div class="note">{{ $note }}</div>
			@endif
		</div>
	</div>
</div>