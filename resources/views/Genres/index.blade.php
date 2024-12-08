@extends('Layouts.layout')
@section('title', __('genre.name'))

@section('content')
    <div class="container">
        <h1>{{__('base.all')}} {{__('genre.genres')}}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">{{__('genre.add_new')}}</a>

        <div class="row">
            @foreach($genres as $genre)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $genre->name }}</h5>
                            <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning">{{__('base.edit')}}</a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('base.delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $genres->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
