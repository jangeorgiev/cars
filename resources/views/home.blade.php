@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">Find Your Dream Car</h3>

            <form method="GET" action="{!! route('home.index') !!}">
                <div class="form-group">
                    @include('shared.table.select', ['name' => 'coupe_type_id', 'items' => $coupeTypes])
                </div>
                <div class="form-group">
                    @include('shared.table.select', ['name' => 'brand_id', 'items' => $brands])
                </div>
                <div class="form-group">
                    @include('shared.table.select', ['name' => 'model_id', 'items' => ['' => 'Select Model']])
                </div>
                <div class="form-group">
                    @include('shared.table.select', ['name' => 'engine_id', 'items' => $engines])
                </div>

                <div class="form-group">
                    <p>
                        <label for="amount">Price range:</label>
                        <input type="text" name="price_range" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                </div>

                <div class="form-group">
                    <div class="col-lg-2">
                        <input type="submit" class="btn btn-primary btn-block" value="Search Vehicle" />
                    </div>
                </div>
            </form>

            @if(isset($cars) && $cars->count() > 0)
                <table class="table table-hover collapse-table">
                    <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td class="" width="35%"><img src="{{ $car->image() }}" alt="Car Image" class="img-thumbnail"></td>
                                <td class="text-center" width="40%">{{ $car->model->brand->name }} {{ $car->model->name }} {{ $car->name }}</td>
                                <td class="text-center" width="25%">${!! $car->price !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif (!empty(\Request::query()))
                <div class="alert alert-success" role="alert">
                    No results found for this search
                </div>
            @endif
        </div>
    </div>
@stop