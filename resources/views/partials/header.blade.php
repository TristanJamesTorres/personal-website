<div class="topline">
    <div class="wrap topline-inner">
        <span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> San Pablo City, Laguna</span>
        <span>Art is a way of seeing the world.</span>
    </div>
</div>

<header class="site-header">
    <div class="wrap header-inner">
        <a href="{{ route('home') }}" class="brand" aria-label="{{ $siteName ?? 'Tristan James Torres' }} — Home">
            <span class="brand-mark" aria-hidden="true"></span>
            <span>Tristan<small>Artist · Designer · Student</small></span>
        </a>

        <button class="nav-toggle icon-button" type="button" aria-label="Open navigation" aria-controls="primary-navigation" aria-expanded="false">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>

        <nav class="main-nav" id="primary-navigation" aria-label="Primary">
            <ul>
                <li><a href="{{ route('home') }}" @class(['is-active' => request()->routeIs('home')]) @if (request()->routeIs('home')) aria-current="page" @endif>Home</a></li>
                <li><a href="{{ route('about') }}" @class(['is-active' => request()->routeIs('about')]) @if (request()->routeIs('about')) aria-current="page" @endif>About</a></li>
                <li><a href="{{ route('gallery') }}" @class(['is-active' => request()->routeIs('gallery*')]) @if (request()->routeIs('gallery*')) aria-current="page" @endif>Gallery</a></li>
                <li><a href="{{ route('contact') }}" @class(['is-active' => request()->routeIs('contact')]) @if (request()->routeIs('contact')) aria-current="page" @endif>Contact</a></li>
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
            <a href="{{ route('contact') }}" class="header-contact">Let’s connect <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i></a>
        </div>
    </div>
</header>
