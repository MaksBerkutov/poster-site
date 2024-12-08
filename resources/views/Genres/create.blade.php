@extends('Layouts.layout')
@section('title', __('base.add_new'))

@section('content')
    <div class="container">
        <h1>{{__('genre.add_new')}}</h1>

        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{__('genre.name')}}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{__('base.save')}}</button>
        </form>
    </div>
@endsection
