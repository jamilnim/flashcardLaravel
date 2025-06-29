<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Name App'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/name.css']); ?>
    
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
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH /Users/s2500148/Herd/NameApp/resources/views/layouts/name-layout.blade.php ENDPATH**/ ?>