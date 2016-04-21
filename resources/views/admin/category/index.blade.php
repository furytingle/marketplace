@extends('layouts.admin')

@section('content')

    {{ link_to_route('admin.category.create', 'New', [], ['class' => 'btn btn-success', 'style' => 'float: right;']) }}

    <div class="container">

        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Controls</th>
            </tr>
            @foreach ($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td>
                        {{ link_to_route('admin.category.destroy', 'Delete', ['id' => $cat->id], ['class' => 'btn btn-danger']) }}
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
@endsection