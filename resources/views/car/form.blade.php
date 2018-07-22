@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">{{ isset($car) ? 'Edit' : 'Add' }} Car</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::open([
                'method' => (isset($car) ? 'PUT' : 'POST'),
                'url' => route('car.'.(isset($car) ? 'update' : 'store'), isset($car) ? [$car->getKey()] : []),
                'files' => true,
            ]) !!}

                @include('shared.form.brand', ['item' => isset($car) ? $car->model : null])
                @include('shared.form.model', ['item' => isset($car) ? $car : null])
                @include('shared.form.engine', ['item' => isset($car) ? $car : null])
                @include('shared.form.coupe', ['item' => isset($car) ? $car : null])
                @include('shared.form.name', ['item' => isset($car) ? $car : null])
                @include('shared.form.color', ['item' => isset($car) ? $car : null])
                @include('shared.form.price', ['item' => isset($car) ? $car : null])
                @include('shared.form.image', ['item' => isset($car) ? $car : null])
                @include('shared.form.active', ['item' => isset($car) ? $car : null])
                @include('shared.form.submit', ['cancelUrl' => route('car.index')])

            {!! Form::close() !!}
        </div>
    </div>
@stop