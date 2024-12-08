@extends('Layouts.layout')
@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <h1>{{__('base.edit')}} {{__('movie.movie')}}</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('base.name') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="poster" class="form-label">{{ __('movie.poster_movies') }}</label>
                <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster">
                @if($movie->poster)
                    <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="img-thumbnail mt-2" width="150">
                @endif
                @error('poster')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genres" class="form-label">{{ __('genre.genres') }}</label>
                <select class="form-control @error('genres') is-invalid @enderror" id="genres" name="genres[]" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $selectedGenres) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genres')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">{{ __('base.update') }}</button>
            </div>
        </form>
    </div>
@endsection
