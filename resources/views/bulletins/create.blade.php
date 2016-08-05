@extends('layouts.app')

@section('content')
    <h2>Create new bulletin</h2>

    <form action="{{ route('users.bulletins.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Title</label>
            <input id="title" type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <div class="help-block">{{ $errors->first('title') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('image') || $errors->has('image_url') ? 'has-error' : '' }}">
            <label class="control-label" for="image">Image</label>
            <input id="image" type="file" name="image" class="form-control" placeholder="Image" value="{{ old('image') }}">
            @if ($errors->has('image'))
                <div class="help-block">{{ $errors->first('image') }}</div>
            @endif
            <div class="text-muted">Or enter the url</div>
            <input id="image_url" type="text" name="image_url" class="form-control" placeholder="Image url" value="{{ old('image_url') }}">
            @if ($errors->has('image_url'))
                <div class="help-block">{{ $errors->first('image_url') }}</div>
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
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection