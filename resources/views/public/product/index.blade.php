@extends('layouts.app')

@section('content')

    @include('partial.alert.error')

    {{ link_to_route('store.index', 'Back', ['link' => Auth::user()->store->link], ['class' => 'btn btn-link']) }}

    @include('partial.alert.success')

    @foreach ($products as $product)
        <div>
            <span>{{ $product->name }}</span>
            <p>
                {{ $product->description }}
            </p>
        </div>
        @if ($product->getImages())
            @foreach($product->getImages() as $image)
                <img src="{{ URL::to('/upload/product/' . $image->value) }}">
            @endforeach
        @endif
    @endforeach

@endsection

@section('right-content')
    {{ link_to_route('product.create', 'New', [], ['class' => 'btn btn-success']) }}
@endsection