@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.floor.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    {{ Form::open(['route' => 'admin.floor.store', 'method' => 'post', 'role' => 'form']) }}

        <div class="form-group">
            {{ Form::label('name', 'Floor name') }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    {{ Form::close() }}

@endsection