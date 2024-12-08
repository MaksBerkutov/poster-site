<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', __('menu.app_name'))</title>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">{{ __('menu.app_name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">{{ __('menu.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('genres.index')}}">{{ __('menu.genre') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('movies.index')}}">{{ __('menu.movie') }}</a>
                    </li>
                </ul>
                <form action="{{ route('locale.change') }}" method="POST" class="d-flex">
                    @csrf
                    <select name="locale" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                        <option value="uk" {{ app()->getLocale() == 'uk' ? 'selected' : '' }}>Українська</option>
                    </select>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        @yield('content')
    </div>

    <footer class="text-center mt-5">
        <p>&copy; {{ date('Y') }} {{ __('menu.app_name') }}. {{ __('menu.rights_reserved') }}</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeo7FMO6VKVk5O4B/9ABncF9UNqPEnQfIzQ7Mo6k61i5SK59" crossorigin="anonymous"></script>
</body>
</html>
