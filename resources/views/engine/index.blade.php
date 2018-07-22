@extends('bootstrap_container')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin: 20px 0;">Engines</h3>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div style="margin: 20px 0">
                <a href="{!! route('engine.create') !!}" class="btn btn-success">Add Engine</a>
            </div>

            <table class="table table-striped table-bordered table-hover collapse-table" data-success="">
                <thead>
                    <tr>
                        <th width="20%" class="text-center">
                            Date Added
                        </th>
                        <th width="60%" class="text-center">
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
                    @if(isset($engines) && $engines->count() > 0)
                        @foreach($engines as $engine)
                            <tr>
                                <td class="text-center">{{ $engine->created_at }}</td>
                                <td class="text-center">{{ $engine->name }}</td>
                                <td class="text-center">{!! statusRenderer($engine->active ) !!}</td>
                                <td class="text-center"><a href="{!! route('engine.edit', ['id' => $engine->id]) !!}">Edit</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No Data Available</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop