@extends('layouts.app')

@section('content')
    <h2 class="page-header">
        @if (isset($byUser))
            @if (Auth::id() === $byUser->id)
                Your bulletins
                <a href="{{ route('users.bulletins.create') }}" class="btn btn-success btn-sm pull-right"> Create new
                    <i class="fa fa-plus"></i>
                </a>
            @else
                Bulletins by {{ $byUser->name }}
            @endif
        @else
            Latest bulletins
        @endif
    </h2>

    @if ($list->count() === 0)
        <h3>No items here</h3>
    @else
        <div class="row">
            @each('shared.bulletin_list_item', $list, 'bulletin')
        </div>
        {!! $list->render() !!}
    @endif
@endsection