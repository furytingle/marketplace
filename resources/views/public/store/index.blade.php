@extends('layouts.app')

@section('content')

    @if (Auth::check())
        {{ link_to_route('store.settings', 'Settings', [], ['class' => 'btn btn-primary']) }}
    @endif

    <h4>{{ $store->link }}</h4>

    <h5>{{ $store->brandName }}</h5>

    <h6>{{ $store->contactData }}</h6>

    @if ($store->photo)
        <img src="{{ URL::to('/uploads/photo/' . $store->photo) }}">
    @endif

    @if ($store->poster)
        <img src="{{ URL::to('/uploads/poster/' . $store->poster) }}">
    @endif

@endsection