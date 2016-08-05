@extends('layouts.app')

@section('content')
    @if (isset($byUser))
        <h2>
            @if (Auth::id() === $byUser->id)
                Your bulletins
                <a href="{{ route('users.bulletins.create') }}" class="btn btn-success btn-sm pull-right"> Create new
                    <i class="fa fa-plus"></i>
                </a>
            @else
                Bulletins by {{ $byUser->name }}
            @endif
        </h2>
    @else
        <h2>Latest bulletins</h2>
    @endif

    @if ($list->count() === 0)
        <h2>No items here</h2>
    @else
        <div class="row">
            @each('shared.bulletin_list_item', $list, 'bulletin')
        </div>
        {!! $list->render() !!}
    @endif
@endsection