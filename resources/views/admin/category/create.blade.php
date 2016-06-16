@extends('layouts.admin')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('admin.category.index', 'Back', [], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    {{ Form::open(['route' => 'admin.category.store', 'method' => 'post', 'role' => 'form']) }}

        <div class="form-group">
            {{ Form::label('name', 'Category name') }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            <label class="control-label" for="floor-select">Floor</label>
            <select name="floorID" id="floor-select">
                @foreach($floors as $floor)
                    <option value="{{ $floor->id }}">{{ $floor->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    {{ Form::close() }}

@endsection