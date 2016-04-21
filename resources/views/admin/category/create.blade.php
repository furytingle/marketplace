@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.category.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <?php print_r($errors); ?>

    {{ Form::open(['route' => 'admin.category.store', 'method' => 'post', 'role' => 'form']) }}

        <div class="form-group">
            {{ Form::label('name', 'Category name') }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    {{ Form::close() }}

@endsection