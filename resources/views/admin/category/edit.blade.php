@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.category.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {{ Form::model($category, ['method' => 'PATCH', 'route' => ['admin.category.update', $category->id]]) }}

        <div class="form-group">
            {{ Form::label('name', 'Category name', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection