@extends('layouts.app')

@section('content')
    @if (!$item)
        <h2>Sorry, bulletin not found</h2>
    @else
        <h1>
            {{ $item->title }}
            <small>
                {{--TODO FIX THAT--}}
                {{ $item->created_date }}
                {{ $now->diffForHumans($item->created_date) }}
            </small>
        </h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-responsive">
            </div>
            <div class="col-md-8">
                <h3 class="text-success">${{ $item->cost }}</h3>
                <p>
                    {{ $item->description }}
                </p>
            </div>
        </div>
    @endif
@endsection