@extends('layouts.app')

@section('title', $artwork['title'])
@section('description', $artwork['alt'])

@section('content')
    <section class="artwork-detail-section">
        <div class="wrap">
            <div class="detail-back-row">
                <a href="{{ route('gallery', ['category' => $artwork['category']]) }}" class="text-link"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Back to {{ strtolower($category['label']) }}</a>
                <span>{{ $artwork['categoryLabel'] }} · {{ $artwork['number'] }}</span>
            </div>

            <figure class="detail-artwork" data-reveal>
                <img src="{{ asset($artwork['image']) }}" alt="{{ $artwork['alt'] }}">
                <figcaption>
                    <div>
                        <span class="eyebrow">{{ $artwork['categoryLabel'] }}</span>
                        <h1>{{ $artwork['title'] }}</h1>
                    </div>
                    <span>{{ $artwork['number'] }} <span class="detail-divider">/</span> {{ str_pad((string) $category['count'], 2, '0', STR_PAD_LEFT) }}</span>
                </figcaption>
            </figure>

            <nav class="artwork-pagination" aria-label="Browse {{ strtolower($category['label']) }}">
                <a href="{{ route('gallery.show', $previous['slug']) }}" class="pagination-link">
                    <span><i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Previous</span>
                    <strong>{{ $previous['title'] }}</strong>
                </a>
                <a href="{{ route('gallery', ['category' => $artwork['category']]) }}" class="pagination-index" aria-label="Back to {{ strtolower($category['label']) }} gallery"><i class="fa-solid fa-grip" aria-hidden="true"></i></a>
                <a href="{{ route('gallery.show', $next['slug']) }}" class="pagination-link pagination-next">
                    <span>Next <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
                    <strong>{{ $next['title'] }}</strong>
                </a>
            </nav>
        </div>
    </section>
@endsection
