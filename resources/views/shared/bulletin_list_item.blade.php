<div class="col-md-3 col-sm-6">
    <div class="thumbnail">
        <img src="{{ $bulletin->image }}" alt="{{ $bulletin->title }}">
        <div class="caption">
            <h3>
                <a href="{{ route('bulletins.show', $bulletin->id) }}">{{ $bulletin->title }}</a>
            </h3>
            <small class="text-muted">from {{ $bulletin->user->name }}</small>
            <div class="text-success">${{ $bulletin->cost }}</div>
            <p>{{ \App\Utils\StringUtils::preview_text($bulletin->description) }}</p>
        </div>
    </div>
</div>