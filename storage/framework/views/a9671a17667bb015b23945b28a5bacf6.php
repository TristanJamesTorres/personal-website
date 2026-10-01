<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#f7f3e9">
    <title><?php echo $__env->yieldContent('title', $siteName ?? 'Tristan James C. Torres'); ?> — <?php echo e($siteTagline ?? 'Artist & Web Designer'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'The art, ideas, and digital work of Tristan James C. Torres — artist, student, and web designer from San Pablo City, Laguna.'); ?>">

    <script>
        (function () {
            try {
                var savedTheme = localStorage.getItem('tj-theme');
                var systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                document.documentElement.dataset.theme = savedTheme || (systemPrefersDark ? 'dark' : 'light');
            } catch (error) {
                document.documentElement.dataset.theme = 'light';
            }
        }());
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=DM+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="icon" type="image/svg+xml" href="<?php echo e(asset('images/tj-logo.svg')); ?>">
</head>
<body id="top">
    <a href="#main" class="skip-link">Skip to content</a>

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main id="main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH D:\MyWebsites\personal-website\resources\views/layouts/app.blade.php ENDPATH**/ ?>