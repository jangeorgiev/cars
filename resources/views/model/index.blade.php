@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">Models</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div style="margin: 20px 0">
                <a href="{!! route('model.create') !!}" class="btn btn-success">Add Model</a>
            </div>

            <form method="GET" action="{!! route('model.index') !!}">
                <div class="row row-grid form-group">
                    @include('shared.table.select', ['name' => 'brand_id', 'items' => $brands])
                    @include('shared.table.submit')
                </div>
            </form>

            <table class="table table-striped table-bordered table-hover collapse-table" data-success="">
                <thead>
                    <tr>
                        <th width="20%" class="text-center">
                            Date Added
                        </th>
                        <th width="30%" class="text-center">
                            Brand
                        </th>
                        <th width="30%" class="text-center">
                            Name
                        </th>
                        <th width="10%" class="text-center">
                            Status
                        </th>
                        <th width="10%" class="text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($models) && $models->count() > 0)
                        @foreach($models as $model)
                            <tr>
                                <td class="text-center">{{ $model->created_at }}</td>
                                <td class="text-center">{{ $model->brand->name }}</td>
                                <td class="text-center">{{ $model->name }}</td>
                                <td class="text-center">{!! statusRenderer($model->active ) !!}</td>
                                <td class="text-center"><a href="{!! route('model.edit', ['id' => $model->id]) !!}">Edit</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">No Data Available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop