<div class="form-group">
    <div class="col-sm-4 col-sm-offset-2">
        <a href="{{ $cancelUrl ?? URL::previous() }}" class="btn btn-white" type="submit">Cancel</a>
        {!! Form::button('Save', ['type' => 'submit', 'class'=>'btn btn-primary'])!!}
    </div>
</div>