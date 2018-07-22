<div class="form-group">
    <label class="col-sm-2 control-label">Model <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::select(
            'model_id',
            isset($models) ? $models : ['' => 'Choose Brand First'],
            isset($item) ? $item->getAttributeValue('model_id') : null,
            ['class' => 'form-control', 'data-id' => old('model_id', isset($item) ? $item->getAttributeValue('model_id') : null)])
        !!}
        @if (isset($errors) && $errors->first('model_id'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('model_id') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
