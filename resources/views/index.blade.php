@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($floors as $floor)
            <div class="container">
                <span>{{ $floor->name }}</span>
                <ul>
                    @foreach($floor->stores as $store)
                        <li>
                            <a href="{{ url('/store/' . $store->link) }}">{{ $store->brandName }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection