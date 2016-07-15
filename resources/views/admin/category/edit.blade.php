@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.category.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    {{ Form::model($category, ['method' => 'PATCH', 'role' => 'form', 'route' => ['admin.category.update', $category->id]]) }}

        <div class="form-group">
            {{ Form::label('name', 'Category name', ['class' => 'control-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label class="control-label" for="floor-select">Floor</label>
            <select name="floorId" id="floor-select">
                @foreach($floors as $floor)
                    <option value="{{ $floor->id }}" @if($floor->id == $category->floorID) selected @endif>{{ $floor->name }}</option>
                @endforeach
            </select>
        </div>

        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection