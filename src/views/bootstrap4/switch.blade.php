<div class="form-group col-12 col-sm-{{ $width }}">
	
	<div class="input-group">
		<div class="custom-control custom-switch">
			<input type="checkbox" name="{{ $name }}" class="custom-control-input" id="{{ $name }}"
					@if($value) checked="checked" @endif
				>
			<label class="custom-control-label" for="{{ $name }}">
				{{ $label }}
				@if ($required)
					<span class="required">*</span>
				@endif	
			</label>	
		</div>
	</div>	
	
	@if ($error)
		<span class="invalid-error">{{ $error }}</span>
	@endif

	@if ($note)
		<small class="form-text text-muted">{{ $note }}</small>
	@endif

</div>