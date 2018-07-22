<div class="form-group @if ($errors && $errors->first('description')) has-error @endif">
    <label class="col-lg-2 control-label">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea(
             'description',
             (isset($item) ? str_replace(['<script>', '</script>', '&lt;script&gt;', '&lt;/script&gt;'], '', $item->getAttributeValue('description')) : ''),
             [
                 'id' => 'description',
                 'class' => 'form-control',
                 'placeholder' => 'Place the Description here'
             ]
         ) !!}
        @if ($errors && $errors->first('description'))
            <span style="color: crimson; padding-top: 5px;">{!! $errors->first('description') !!}</span>
        @endif
    </div>
</div>
<div class="hr-line-dashed"></div>
