<div class="col-md-3">
    <div class="thumbnail bulletin">
        <div class="bulletin-image" style="height: 200px;position: relative;overflow: hidden;">
            <img src="{{ $bulletin->getImageUrl() }}" alt="{{ $bulletin->title }}" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);max-width: 100%;">
        </div>
        <div class="caption bulletin-content">
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
