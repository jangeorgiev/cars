<div class="form-group">
    <label class="col-sm-2 control-label">Color <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::text('color', isset($item) ? $item->getAttributeValue('color') : null, ['class' => 'form-control', 'placeholder' => 'Describe the car color...']) !!}
        @if (isset($errors) && $errors->first('color'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('color') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
