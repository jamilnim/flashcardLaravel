<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Name App')</title>
    @vite(['resources/css/name.css'])
    
</head >

<body>
    <header>
        
        <div class="nav-links">
            <a href="/name">Name Color App</a>
            <a href="/flashcards">Flashcards</a>
            <a href="/favorites-view">Favorites</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
