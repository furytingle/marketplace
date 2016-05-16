@extends('layouts.admin')

@section('content')

    {{ link_to_route('admin.floor.create', 'New floor', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($floors as $floor)
                <tr>
                    <td>{{ $floor->id }}</td>
                    <td>{{ $floor->name }}</td>
                    <td>{{ $floor->description }}</td>
                    <td>
                        {{ link_to_route('admin.floor.edit', 'Edit', ['id' => $floor->id], ['class' => 'btn btn-info']) }}
                    </td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.floor.destroy', 'id' => $floor->id], 'id' => 'deleteForm']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection