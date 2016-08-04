@extends('layouts.app')

@section('content')
    @if ($list->count() === 0)
        <h2>No items here</h2>
    @else
        <div class="row">
            @each('shared.bulletin_list_item', $list, 'bulletin')
        </div>
        {!! $list->render() !!}
    @endif
@endsection