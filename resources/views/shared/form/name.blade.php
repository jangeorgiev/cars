<div class="form-group">
    <label class="col-sm-2 control-label">Name <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::text('name', isset($item) ? $item->getAttributeValue('name') : null, ['class' => 'form-control']) !!}
        @if (isset($errors) && $errors->first('name'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('name') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
