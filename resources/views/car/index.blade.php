@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">Cars</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div style="margin: 20px 0">
                <a href="{!! route('car.create') !!}" class="btn btn-success">Add Car</a>
            </div>

            <table class="table table-striped table-bordered table-hover collapse-table" data-success="">
                <thead>
                    <tr>
                        <th width="10%" class="text-center">
                            Date Added
                        </th>
                        <th width="12%" class="text-center">
                            Brand
                        </th>
                        <th width="12%" class="text-center">
                            Model
                        </th>
                        <th width="12%" class="text-center">
                            Engine
                        </th>
                        <th width="10%" class="text-center">
                            Coupe
                        </th>
                        <th width="20%" class="text-center">
                            Name
                        </th>
                        <th width="10%" class="text-center">
                            Price
                        </th>
                        <th width="7%" class="text-center">
                            Status
                        </th>
                        <th width="7%" class="text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($cars) && $cars->count() > 0)
                        @foreach($cars as $car)
                            <tr>
                                <td class="text-center">{{ $car->created_at }}</td>
                                <td class="text-center">{{ $car->model->brand->name }}</td>
                                <td class="text-center">{{ $car->model->name }}</td>
                                <td class="text-center">{{ $car->engine->name }}</td>
                                <td class="text-center">{{ $car->coupeType->name }}</td>
                                <td class="text-center">{{ $car->name }}</td>
                                <td class="text-center">{{ $car->price }}</td>
                                <td class="text-center">{!! statusRenderer($car->active ) !!}</td>
                                <td class="text-center"><a href="{!! route('car.edit', ['id' => $car->id]) !!}">Edit</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">No Data Available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop