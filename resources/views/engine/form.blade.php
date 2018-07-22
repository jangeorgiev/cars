@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">{{ isset($engine) ? 'Edit' : 'Add' }} Engine</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::open([
                'method' => (isset($engine) ? 'PUT' : 'POST'),
                'url' => route('engine.'.(isset($engine) ? 'update' : 'store'), isset($engine) ? [$engine->getKey()] : []),
                'files' => false,
            ]) !!}

                @include('shared.form.name', ['item' => isset($engine) ? $engine : null])
                @include('shared.form.description', ['item' => isset($engine) ? $engine : null])
                @include('shared.form.active', ['item' => isset($engine) ? $engine : null])
                @include('shared.form.submit', ['cancelUrl' => route('engine.index')])

            {!! Form::close() !!}
        </div>
    </div>
@stop