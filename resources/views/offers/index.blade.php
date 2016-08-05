@extends('layouts.app')

@section('content')
    @if (count($offers) === 0)
        <h2>You hasn't created any offer</h2>
        <a href="{{ url('/') }}">Create one?</a>
    @else
        <h2 class="page-header">Your offers ({{ count($offers) }})</h2>

        @foreach($offers as $offer)
            <div class="text-muted">
                for <a href="{{ route('bulletins.show', $offer->bulletin) }}">{{ $offer->bulletin->title }}</a>
            </div>
            @include('shared.offer_list_item', $offers)
        @endforeach
    @endif
@endsection