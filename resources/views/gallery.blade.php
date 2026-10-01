@extends('layouts.app')

@section('title', 'Gallery')
@section('description', 'Explore 104 traditional-art pieces, digital illustrations, and outfit photographs by Tristan James C. Torres.')

@section('content')
    <section class="page-intro-section gallery-intro">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">The things I make & love</span>
                <h1 class="page-title">The creative<br><em>archive.</em></h1>
            </div>
            <p data-reveal>Sketchbook pages, digital worlds, and personal style. Take your time — there’s plenty to see.</p>
        </div>
    </section>

    <section class="gallery-section">
        <div class="wrap">
            <div class="gallery-topline">
                <span>{{ count($artworks) }} {{ count($artworks) === 1 ? 'piece' : 'pieces' }}</span>
            </div>

            <nav class="gallery-tabs" aria-label="Filter artwork by category">
                <a href="{{ route('gallery', $search !== '' ? ['q' => $search] : []) }}" @class(['is-active' => !$activeCategory]) @if (!$activeCategory) aria-current="page" @endif>
                    Everything <span>{{ $categories['traditional-art']['count'] + $categories['digital-art']['count'] + $categories['outfits']['count'] }}</span>
                </a>
                @foreach ($categories as $key => $category)
                    <a href="{{ route('gallery', array_filter(['category' => $key, 'q' => $search], fn ($value) => $value !== null && $value !== '')) }}" @class(['is-active' => $activeCategory === $key]) @if ($activeCategory === $key) aria-current="page" @endif>
                        {{ $category['label'] }} <span>{{ $category['count'] }}</span>
                    </a>
                @endforeach
            </nav>

            @if (count($artworks) === 0)
                <div class="empty-state">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                    <h2>Nothing in this frame</h2>
                    <p>Try a different search or browse another collection.</p>
                    <a href="{{ route('gallery') }}" class="button button-primary">View all artwork <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
            @else
                <div class="artwork-grid">
                    @foreach ($artworks as $artwork)
                        <a href="{{ route('gallery.show', $artwork['slug']) }}"
                           class="artwork-card"
                           data-lightbox
                           data-image="{{ asset($artwork['image']) }}"
                           data-alt="{{ $artwork['alt'] }}"
                           data-title="{{ $artwork['title'] }}"
                           data-category="{{ $artwork['categoryLabel'] }}">
                            <div class="artwork-image">
                                <img src="{{ asset($artwork['image']) }}" alt="{{ $artwork['alt'] }}" loading="{{ $loop->index < 6 ? 'eager' : 'lazy' }}" decoding="async">
                                <span class="artwork-zoom" aria-hidden="true"><i class="fa-solid fa-expand"></i></span>
                            </div>
                            <div class="artwork-caption">
                                <span>{{ $artwork['categoryLabel'] }}</span>
                                <span>No. {{ $artwork['number'] }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <dialog class="lightbox" aria-label="Artwork viewer">
        <div class="lightbox-toolbar">
            <p class="lightbox-title"></p>
            <button class="icon-button lightbox-close" type="button" aria-label="Close artwork viewer"><i class="fa-solid fa-xmark" aria-hidden="true"></i></button>
        </div>
        <div class="lightbox-stage">
            <button class="icon-button lightbox-previous" type="button" aria-label="Previous artwork"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i></button>
            <img class="lightbox-image" alt="">
            <button class="icon-button lightbox-next" type="button" aria-label="Next artwork"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></button>
        </div>
        <div class="lightbox-caption">
            <span class="lightbox-category"></span>
            <span class="lightbox-count"></span>
        </div>
    </dialog>
@endsection
