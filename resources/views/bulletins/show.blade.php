@extends('layouts.app')

@section('content')
    @if (!$item)
        <h2>Sorry, bulletin not found</h2>
    @else
        <h1>{{ $item->title }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="img-responsive">
            </div>
            <div class="col-md-8">
                <div class="text-muted">from {{ $item->user->name }}</div>
                <h3 class="text-success">${{ $item->cost }}</h3>
                <p>
                    {{ $item->description }}
                </p>
                @unless ($item->isActive())
                    <div class="text-danger">
                        Bulletin is closed
                    </div>
                @endunless

                <hr>
                @if ($item->user->id !== $user->id)
                    @if ($item->isOfferCreated($user))
                        <h3>Your offer has been sent</h3>
                    @else
                        <h3>Create offer</h3>
                        <form action="{{ route('bulletins.offers.store', $item) }}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label class="control-label" for="title">Title</label>
                                <input id="title" type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <div class="help-block">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label class="control-label" for="description">Description</label>
                                <textarea id="description" name="description" class="form-control" placeholder="Description" style="resize: none; height: 150px;">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="help-block">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                                <label class="control-label" for="cost">Cost</label>
                                <input id="cost" type="number" name="cost" class="form-control" placeholder="Title" value="{{ old('cost') }}">
                                @if ($errors->has('cost'))
                                    <div class="help-block">{{ $errors->first('cost') }}</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default">Send</button>
                        </form>
                    @endif
                @else
                    <h3>Offers ({{ count($item->offers) }})</h3>
                    <div class="row">
                        @each('shared.offer_list_item', $item->offers, 'offer')
                    </div>
                @endif
            </div>
        </div>
    @endif
@endsection