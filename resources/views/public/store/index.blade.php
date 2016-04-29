@extends('layouts.app')

@section('content')

    {{ link_to_route('store.edit', 'Edit', [], ['class' => 'btn btn-primary']) }}

    <h4>{{ $store->link }}</h4>

    <h5>{{ $store->brandName }}</h5>

    <h6>{{ $store->contactData }}</h6>

    @if ($store->photo)
        <img src="uploads/photo/{{ $store->photo }}">
    @endif

    @if ($store->poster)
        <img src="uploads/poster/{{ $store->photo }}">
    @endif

@endsection