@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">{{ isset($model) ? 'Edit' : 'Add' }} Model</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::open([
                'method' => (isset($model) ? 'PUT' : 'POST'),
                'url' => route('model.'.(isset($model) ? 'update' : 'store'), isset($model) ? [$model->getKey()] : []),
                'files' => false,
            ]) !!}

                @include('shared.form.brand', ['item' => isset($model) ? $model : null, 'required' => true])
                @include('shared.form.name', ['item' => isset($model) ? $model : null])
                @include('shared.form.active', ['item' => isset($model) ? $model : null])
                @include('shared.form.submit', ['cancelUrl' => route('model.index')])

            {!! Form::close() !!}
        </div>
    </div>
@stop