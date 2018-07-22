<div class="form-group">
    <label class="col-sm-2 control-label">Price <span class="text-danger">*</span></label>
    <div class="col-sm-3">
        {!! Form::number('price', isset($item) ? $item->getAttributeValue('price') : null, ['class' => 'form-control']) !!}
        @if ($errors && $errors->first('price'))
            <span style="color: crimson; padding-top: 5px;">{!! $errors->first('price') !!}</span>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>