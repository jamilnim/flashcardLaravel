<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Finnish Flashcards</title>
    <?php echo app('Illuminate\Foundation\Vite')->reactRefresh(); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/flashcards.jsx']); ?>
</head>

<header style="padding: 1rem; background: #979393;">
    <a href="/name" style="margin-right: 10px;">Name Color App</a>
    <a href="/flashcards">Flashcards</a>
</header>

<body>
    <?php echo $__env->yieldContent('content'); ?>
</body>

</html>
<?php /**PATH /Users/s2500148/Herd/NameApp/resources/views/layouts/flashcards.blade.php ENDPATH**/ ?>