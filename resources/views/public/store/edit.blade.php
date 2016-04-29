@extends('layouts.app');

@section('content')

    @include('partial.alert.error')

    @include('partial.alert.success')

    {{ Form::model($store, ['route' => 'store.update', 'method' => 'post', 'role' => 'form', 'files' => true]) }}

        <div class="form-group">
            {{ Form::label('link', 'Link') }}
            {{ Form::text('link', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('brandName', 'Brand Name') }}
            {{ Form::text('brandName', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('contactData', 'Contact Data') }}
            {{ Form::textarea('contactData', null, ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('photo', 'Photo') }}
            {{ Form::file('photo') }}
            @if ($store->photo)
                <span>{{ $store->photo }}</span>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('poster', 'Poster') }}
            {{ Form::file('poster') }}
            @if ($store->poster)
                <span>{{ $store->poster }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Save</button>

    {{ Form::close() }}

@endsection