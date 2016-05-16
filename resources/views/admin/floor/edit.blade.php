@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.floor.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    {{ Form::model($floor, ['method' => 'PATCH', 'route' => ['admin.floor.update', $floor->id]]) }}

        <div class="form-group">
            {{ Form::label('name', 'Floor name', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection