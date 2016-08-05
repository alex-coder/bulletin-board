@extends('layouts.app')

@section('content')
    @if (!$item)
        <h2>Sorry, bulletin not found</h2>
    @else
        <h1 class="page-header">{{ $item->title }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $item->getImageUrl() }}" alt="{{ $item->title }}" class="img-responsive">
            </div>
            <div class="col-md-8">
                <div class="text-muted">from {{ $item->user->name }}</div>
                <h3 class="text-success">${{ $item->cost }}</h3>
                <p>
                    {{ $item->description }}
                </p>
                @unless ($item->isActive())
                    <div class="text-danger">Bulletin is closed</div>
                @endunless

                <hr>
                @if ($item->user->id !== $user->id)
                    @if ($item->isOfferCreated($user))
                        <h3>Your offer:</h3>
                        @include('shared.offer_list_item', ['offer' => $item->offerByUser($user)])
                    @else
                        @include('shared.create_offer_form', ['offer' => $item])
                    @endif
                @else
                    <h3>Offers ({{ count($item->offers) }})</h3>
                    <div class="row">
                        @each('shared.offer_list_item', $item->offers, 'offer')
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection