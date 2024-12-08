@extends('Layouts.layout')
@section('title', __('genre.name'))

@section('content')
    <div class="container">
        <h1>{{__('base.all')}} {{__('movie.movies')}}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">{{__('movie.add_new')}}</a>

        <div class="row">
            @foreach($movies as $movie)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $movie->poster_url) }}" class="card-img-top" alt="Poster">

                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">
                            <strong>{{ __('genre.genres') }}:</strong>
                            @if ($movie->genres->isEmpty())
                                {{ __('movie.no_genres') }}
                            @else
                                {{ $movie->genres->pluck('name')->join(', ') }}
                            @endif
                        </p>
                        <p class="card-text">
                            <strong>{{ __('movie.publication_status') }}:</strong>
                            {{ $movie->is_published ? __('movie.published') : __('movie.not_published') }}
                        </p>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">{{ __('base.edit') }}</a>
                        @if( !$movie->is_published )
                            <form action="{{ route('movies.publish', $movie->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">{{ __('movie.publish') }}</button>
                            </form>
                        @endif
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('base.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $movies->links('pagination::bootstrap-5') }}
        </div>

    </div>



@endsection
