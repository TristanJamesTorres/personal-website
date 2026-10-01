@extends('layouts.app')

@section('title', $profile['displayName'])
@section('description', $profile['tagline'])

@section('content')
    <section class="hero" id="top">
        <div class="hero-stage">
            <div class="hero-stage-inner wrap">
                <h1 class="hero-wordmark-title">TRISTAN</h1>

                <figure class="hero-portrait">
                    <img src="{{ asset('images/tristan-cutout.png') }}" alt="Tristan James Torres, artist and web designer" fetchpriority="high">
                </figure>

                <div class="hero-intro" data-reveal>
                    <p>{{ $profile['tagline'] }}</p>
                    <div class="hero-actions">
                        <a href="{{ route('gallery') }}" class="button button-primary">Explore my work <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="{{ route('about') }}" class="button button-quiet">A little about me</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#welcome" class="scroll-cue"><span>Scroll to explore</span><i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
    </section>

    <section class="welcome-section" id="welcome">
        <div class="wrap welcome-grid">
            <div class="welcome-copy" data-reveal>
                <span class="eyebrow">A space for the things I love</span>
                <h2>Welcome to<br>my <em>little corner.</em></h2>
                <p>From pencil and paper to pixels and code, this is where my different interests meet. Take a look around, find a piece that speaks to you, and let’s get creative together.</p>
                <a href="{{ route('gallery') }}" class="text-link">Find your favorite piece <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="welcome-photo" data-reveal>
                <img src="{{ asset('images/welcome.jpg') }}" alt="Portrait from Tristan’s original portfolio" loading="lazy">
                <span class="photo-caption">A little creativity goes a long way.</span>
            </div>
        </div>
    </section>

    <section class="section work-section" id="selected-work">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">Collected along the way</span>
                    <h2 class="section-title">A few favorites<span>.</span></h2>
                </div>
                <a href="{{ route('gallery') }}" class="text-link">See the full gallery <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <div class="featured-grid">
                @foreach ($featuredArtworks as $artwork)
                    <a href="{{ route('gallery.show', $artwork['slug']) }}" class="featured-card" data-reveal>
                        <div class="featured-image">
                            <img src="{{ asset($artwork['image']) }}" alt="{{ $artwork['alt'] }}" loading="lazy">
                            <span class="image-open" aria-hidden="true"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                        </div>
                        <div class="featured-meta">
                            <span>{{ $artwork['categoryLabel'] }}</span>
                            <span>{{ $artwork['number'] }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="category-section">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">Pick a path</span>
                    <h2 class="section-title">What are you<br><em>in the mood for?</em></h2>
                </div>
                <p class="section-intro">Three collections, a hundred little windows into the things that inspire me.</p>
            </div>
            <div class="category-grid">
                @foreach ($categories as $key => $category)
                    <a href="{{ route('gallery', ['category' => $key]) }}" class="category-card" data-reveal>
                        <div class="category-icon"><i class="fa-solid {{ $category['icon'] }}" aria-hidden="true"></i></div>
                        <div>
                            <span class="category-count">{{ $category['count'] }} pieces</span>
                            <h3>{{ $category['label'] }}</h3>
                            <p>{{ $category['description'] }}</p>
                        </div>
                        <span class="category-arrow"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
