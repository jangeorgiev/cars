<div class="form-group">
    <label class="col-sm-2 control-label">Brand <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::select(
            'brand_id',
            isset($brands) ? $brands : array_prepend(
                    \App\Domain\Brand\Model::all()->pluck('name', 'id')->toArray(),
                    'Choose Brand',
                    ''
                ),
            isset($item) ? $item->getAttributeValue('brand_id') : null,
            ['class' => 'form-control'])
        !!}
        @if (isset($errors) && $errors->first('brand_id'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('brand_id') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>