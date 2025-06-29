<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Finnish Flashcards</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/flashcards.jsx'])

</head>

<body>
    <header>
        <div class="header-title">Finnish Flashcards</div>
        <div class="nav-links">
            <a href="/name">Name Color App</a>
            <a href="/flashcards">Flashcards</a>
            <a href="/favorites-view">Favorites</a>
        </div>
    </header>

    <main style="padding: 2rem;">
        @yield('content')
    </main>
    <footer>
        &copy; Muhammad Jamil
        <div class="header-title">Finnish Flashcards</div>
        <div class="nav-links">
            <a href="/name">Name Color App</a>
            <a href="/flashcards">Flashcards</a>
            <a href="/favorites-view">Favorites</a>
        </div>
        
    </footer>
</body>

</html>
