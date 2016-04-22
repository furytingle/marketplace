@extends('layouts.admin')

@section('content')

    {{ link_to_route('admin.category.create', 'New category', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        {{ link_to_route('admin.category.edit', 'Edit', ['id' => $cat->id], ['class' => 'btn btn-info']) }}
                    </td>
                    <td>
                        {{ Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', 'id' => $cat->id], 'id' => 'deleteForm']) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection