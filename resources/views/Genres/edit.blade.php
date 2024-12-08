@extends('Layouts.layout')
@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <h1>{{__('base.edit')}} {{__('genre.genre')}}</h1>

        <form action="{{ route('genres.update', $genre->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">{{__('genre.name')}}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">{{__('base.update')}}</button>
        </form>
    </div>
@endsection
