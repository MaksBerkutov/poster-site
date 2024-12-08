@extends('Layouts.layout')
@section('title', __('base.add_new'))

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>{{__('movie.add_new')}}</h1>
        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">{{__('base.name')}} {{__('movie.movies')}}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}" name="title" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="poster">{{__('movie.poster_movies')}}</label>
                <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster"  value='{{old('poster')}}' name="poster">
                @error('poster')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="genres" class="form-label">{{ __('movies.genres') }}</label>
                <select class="form-control @error('genres') is-invalid @enderror" id="genres" name="genres[]" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genres')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">{{__('base.create')}}</button>
        </form>

    </div>
@endsection
