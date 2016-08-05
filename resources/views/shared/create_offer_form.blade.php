<h3>Create offer</h3>
<form action="{{ route('bulletins.offers.store', $offer) }}" method="post">
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
    <button type="submit" class="btn btn-primary">Send</button>
</form>