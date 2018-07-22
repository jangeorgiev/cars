@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">{{ isset($brand) ? 'Edit' : 'Add' }} Brand</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            {!! Form::open([
                'method' => (isset($brand) ? 'PUT' : 'POST'),
                'url' => route('brand.'.(isset($brand) ? 'update' : 'store'), isset($brand) ? [$brand->getKey()] : []),
                'files' => false,
            ]) !!}

                @include('shared.form.name', ['item' => isset($brand) ? $brand : null])
                @include('shared.form.active', ['item' => isset($brand) ? $brand : null])
                @include('shared.form.submit', ['cancelUrl' => route('brand.index')])

            {!! Form::close() !!}
        </div>
    </div>
@stop