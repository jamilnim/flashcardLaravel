<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Finnish Flashcards</title>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/flashcards.jsx']); ?>

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
        <?php echo $__env->yieldContent('content'); ?>
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
<?php /**PATH /Users/s2500148/Herd/NameApp/resources/views/layouts/app.blade.php ENDPATH**/ ?>