@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th></th>
                <th>Controls</th>
                <th></th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format("Y-m-d H:i:s") }}</td>
                    <td>
                        @if($user->approved)
                            <p class="bg-success text-uppercase text-center">Approved</p>
                        @endif
                    </td>
                    <td>
                        {{ link_to_route('admin.user.approve', 'Switch', ['id' => $user->id], ['class' => 'btn btn-primary']) }}
                    </td>
                    <td>
                        {{ link_to_route('admin.user.destroy', 'Delete', ['id' => $user->id], ['class' => 'btn btn-danger']) }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection