<div class="col-md-3 col-sm-6">
    <div class="thumbnail bulletin">
        <div class="bulletin-image">
            <img src="{{ $bulletin->getImageUrl() }}" alt="{{ $bulletin->title }}">
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

<style>
    .bulletin .bulletin-image {
        height: 200px;
        position: relative;
        overflow: hidden;
    }
    .bulletin .bulletin-image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
    }

    .bulletin .bulletin-content {
        height: 360px;
        overflow: hidden;
    }

    .bulletin-content p {
        white-space: pre-line;
        overflow: hidden;
        padding: 5px;
        text-overflow: ellipsis;
    }
</style>