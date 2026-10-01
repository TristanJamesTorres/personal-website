@extends('layouts.app')

@section('title', 'About Tristan')
@section('description', 'Meet Tristan James Torres: self-taught artist, web designer, and Information Technology student from San Pablo City, Laguna.')

@section('content')
    <section class="page-intro-section">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">A little more about me</span>
                <h1 class="page-title">Curious mind.<br><em>Creative heart.</em></h1>
            </div>
            <p data-reveal>I’m Tristan — an artist and web designer learning how to bring thoughtful ideas to life, both on paper and on screen.</p>
        </div>
    </section>

    <section class="section about-section">
        <div class="wrap about-grid">
            <div class="about-portrait" data-reveal>
                <img src="{{ asset($profile['portrait']) }}" alt="Portrait drawing of Tristan" loading="lazy">
                <span class="portrait-caption">{{ $profile['location'] }}</span>
            </div>
            <div class="about-story">
                @foreach ($bio['paragraphs'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach

                <div class="about-facts">
                    <div class="fact-block">
                        <span class="eyebrow">Currently studying</span>
                        <p>{{ $profile['school'] }}</p>
                    </div>
                    <div class="fact-block">
                        <span class="eyebrow">Creative tools</span>
                        <ul class="tool-list">
                            @foreach ($tools as $tool)
                                <li>{{ $tool }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="interests-section">
        <div class="wrap">
            <div class="section-heading" data-reveal>
                <div>
                    <span class="eyebrow">A few of my favorite things</span>
                    <h2 class="section-title">The things that<br><em>make me, me.</em></h2>
                </div>
            </div>
            <div class="interest-grid">
                @foreach ($interests as $interest)
                    <article class="interest-card" data-reveal>
                        <i class="fa-solid {{ $interest['icon'] }}" aria-hidden="true"></i>
                        <h3>{{ $interest['label'] }}</h3>
                    </article>
                @endforeach
            </div>
            <div class="about-cta" data-reveal>
                <p>Good ideas grow when they’re shared.</p>
                <a href="{{ route('contact') }}" class="button button-primary">Let’s talk <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </section>
@endsection
