<div class="form-group">
    <label class="col-sm-2 control-label">Coupe Type <span class="text-danger">*</span></label>
    <div class="col-sm-10">
        {!! Form::select(
            'coupe_type_id',
            isset($coupes) ? $coupes : array_prepend(
                    \App\Domain\CoupeType\Model::all()->pluck('name', 'id')->toArray(),
                    'Choose Coupe Type',
                    ''
                ),
            isset($item) ? $item->getAttributeValue('coupe_type_id') : null,
            ['class' => 'form-control'])
        !!}
        @if (isset($errors) && $errors->first('coupe_type_id'))
            <div style="color: crimson; padding-top: 5px;">{{ $errors->first('coupe_type_id') }}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>