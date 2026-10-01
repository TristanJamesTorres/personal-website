<div class="topline">
    <div class="wrap topline-inner">
        <span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> San Pablo City, Laguna</span>
        <span>Art is a way of seeing the world.</span>
    </div>
</div>

<header class="site-header">
    <div class="wrap header-inner">
        <a href="<?php echo e(route('home')); ?>" class="brand" aria-label="<?php echo e($siteName ?? 'Tristan James C. Torres'); ?> — Home">
            <span class="brand-mark" aria-hidden="true"></span>
            <span>Tristan<small>Artist · Designer · Student</small></span>
        </a>

        <button class="nav-toggle icon-button" type="button" aria-label="Open navigation" aria-controls="primary-navigation" aria-expanded="false">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>

        <nav class="main-nav" id="primary-navigation" aria-label="Primary">
            <ul>
                <li><a href="<?php echo e(route('home')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => request()->routeIs('home')]); ?>" <?php if(request()->routeIs('home')): ?> aria-current="page" <?php endif; ?>>Home</a></li>
                <li><a href="<?php echo e(route('about')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => request()->routeIs('about')]); ?>" <?php if(request()->routeIs('about')): ?> aria-current="page" <?php endif; ?>>About</a></li>
                <li><a href="<?php echo e(route('gallery')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => request()->routeIs('gallery*')]); ?>" <?php if(request()->routeIs('gallery*')): ?> aria-current="page" <?php endif; ?>>Gallery</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['is-active' => request()->routeIs('contact')]); ?>" <?php if(request()->routeIs('contact')): ?> aria-current="page" <?php endif; ?>>Contact</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <button class="theme-toggle" type="button" role="switch" aria-label="Dark mode" aria-checked="false" title="Toggle dark mode">
                <span class="theme-toggle-track" aria-hidden="true">
                    <span class="theme-toggle-thumb">
                        <i class="fa-solid fa-moon theme-icon-moon"></i>
                        <i class="fa-solid fa-sun theme-icon-sun"></i>
                    </span>
                </span>
            </button>
            <a href="<?php echo e(route('contact')); ?>" class="header-contact">Let’s connect <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</header>
<?php /**PATH D:\MyWebsites\personal-website\resources\views/partials/header.blade.php ENDPATH**/ ?>