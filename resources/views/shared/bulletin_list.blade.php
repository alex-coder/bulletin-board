@foreach(array_chunk($list->getCollection()->all(), 4) as $row)
    <div class="row">
        @each('shared.bulletin_list_item', $row, 'bulletin')
    </div>
@endforeach