<div class="form-group">
    <label class="col-sm-2 control-label">Upload image <span class="text-danger">*</span></label>
    @if (isset($item))
        <div class="col-sm-10 form-group">
            <img src="{{ $item->image() }}" alt="Image" class="img-fluid">
        </div>
    @endif
    <div class="col-sm-10">
        {!! Form::file('image', ['accept' => 'image/*']) !!}
        @if ($errors && $errors->first('image'))
            <div style="color: crimson; padding-top: 5px;">{!! $errors->first('image') !!}</div>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>