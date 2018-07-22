<div class="form-group">
    <label class="col-sm-2 control-label">Engine <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::select(
            'engine_id',
            isset($engines) ? $engines : array_prepend(
                    \App\Domain\Engine\Model::all()->pluck('name', 'id')->toArray(),
                    'Choose Engine',
                    ''
                ),
            isset($item) ? $item->getAttributeValue('engine_id') : null,
            ['class' => 'form-control'])
        !!}
        @if (isset($errors) && $errors->first('engine_id'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('engine_id') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>