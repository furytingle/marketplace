@extends('layouts.app')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('product.index', 'Back', ['link' => Auth::user()->store->link], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    {{ Form::open(['route' => ['product.store', 'link' => Auth::user()->store->link], 'method' => 'post',
                    'role' => 'form', 'files' => true, 'id' => 'productForm']) }}

        <div class="form-group">

            <div class="radio">
                <label><input type="radio" name="type" checked value="1">Product</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="type" value="2">Service</label>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Product name') }}
            {{ Form::text('name', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('images', 'Images') }}
            {{ Form::file('images', ['name' => 'image']) }}
        </div>

        <div id="image-preload">
        </div>

        <button type="submit" class="btn btn-success">Create</button>

    {{ Form::close() }}


@endsection