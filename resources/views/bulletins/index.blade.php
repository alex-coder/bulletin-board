@extends('layouts.app')

@section('content')
    @if ($list->count() === 0)
        <h2>No items here</h2>
    @else
        <div class="row">
            @foreach($list as $bulletin)
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <img src="{{ $bulletin->image }}" alt="{{ $bulletin->title }}">
                        <div class="caption">
                            <h3>
                                <a href="{{ route('bulletins.show', $bulletin->id) }}">{{ $bulletin->title }}</a>
                            </h3>
                            <p>{{ \App\Utils\StringUtils::preview_text($bulletin->description) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $list->render() !!}
    @endif
@endsection