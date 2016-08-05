<div class="col-md-3 col-sm-6">
    <div class="thumbnail">
        <img src="{{ $bulletin->getImageUrl() }}" alt="{{ $bulletin->title }}">
        <div class="caption">
            <h3>
                <a href="{{ route('bulletins.show', $bulletin->id) }}">{{ $bulletin->title }}</a>
            </h3>
            @if ($bulletin->isClosed())
                <div class="text-danger">
                    Bulletin is closed
                </div>
            @endif
            <small class="text-muted">
                from <a href="{{ route('users.bulletins.index', $bulletin->user) }}">{{ $bulletin->user->name }}</a>
            </small>
            <div class="text-success">${{ $bulletin->cost }}</div>
            <p>{{ \App\Utils\StringUtils::preview_text($bulletin->description) }}</p>
        </div>
    </div>
</div>