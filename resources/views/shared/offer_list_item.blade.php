<div class="col-md-12 {{ $offer->isApplied() ? 'bg-success' : '' }}" style="margin-bottom: 20px">
    <div class="media" style="padding-top: 10px">
        <div class="media-left" style="min-width: 70px">
            <p>{{ $offer->user->name }}</p>
            <small class="text-success">${{ $offer->cost }}</small>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $offer->title }}</h4>
            <p>{{ $offer->description }}</p>
            @if ($offer->bulletin->isActive())
                <a href="{{ route('offers.apply', $offer) }}" class="btn btn-success">Apply</a>
            @endif
        </div>
    </div>
</div>