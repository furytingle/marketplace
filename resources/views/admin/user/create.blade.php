@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('users.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif


    {{ Form::open(['url' => 'users.store', 'method' => 'post', 'role' => 'form']) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

    {{ Form::close() }}
@endsection