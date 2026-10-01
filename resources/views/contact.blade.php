@extends('layouts.app')

@section('title', 'Contact')
@section('description', 'Get in touch with Tristan James Torres about art, web design, or a creative collaboration.')

@section('content')
    <section class="page-intro-section contact-intro">
        <div class="wrap page-intro-grid">
            <div data-reveal>
                <span class="eyebrow">For ideas, questions & collaborations</span>
                <h1 class="page-title">Let’s create<br><em>something.</em></h1>
            </div>
            <p data-reveal>Have a project, a question, or just want to talk about art? I’d be happy to hear from you.</p>
        </div>
    </section>

    <section class="section contact-section">
        <div class="wrap contact-grid">
            <aside class="contact-details" data-reveal>
                <span class="eyebrow">Find me here</span>
                <h2>Say hello<span>.</span></h2>
                <p class="contact-lede">Whether you have something in mind or just want to connect, my inbox is open.</p>
                <a href="mailto:{{ $profile['email'] }}" class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-envelope" aria-hidden="true"></i></span>
                    <span><small>Email</small>{{ $profile['email'] }}</span>
                    <i class="fa-solid fa-arrow-up-right-from-square detail-arrow" aria-hidden="true"></i>
                </a>
                <a href="tel:{{ $profile['phone'] }}" class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
                    <span><small>Phone</small>{{ $profile['phone'] }}</span>
                    <i class="fa-solid fa-arrow-up-right-from-square detail-arrow" aria-hidden="true"></i>
                </a>
                <div class="contact-detail">
                    <span class="contact-icon"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                    <span><small>Based in</small>San Pablo City, Laguna, Philippines</span>
                </div>

                <div class="social-links">
                    <span class="eyebrow">Find me online</span>
                    <div>
                        @foreach ($profile['socials'] as $social)
                            <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['name'] }}"><i class="fa-brands {{ $social['icon'] }}" aria-hidden="true"></i></a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <div class="contact-form-panel" data-reveal>
                @if (session('sent'))
                    <div class="form-success" role="status" tabindex="-1" data-focus-on-load>
                        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                        <div><strong>Thanks, {{ session('sentName') }}.</strong><p>Your message has been noted. This demo form does not send email yet.</p></div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="form-error-summary" role="alert" tabindex="-1" data-focus-on-load>
                        <strong>Please check the details below.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                    @csrf
                    <div class="form-heading">
                        <span class="eyebrow">Drop me a line</span>
                        <h2>Tell me what you’re thinking.</h2>
                    </div>

                    <div class="form-field">
                        <label for="name">Your name</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif>
                        @error('name')<span class="field-error" id="name-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="email">Email address</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif>
                            @error('email')<span class="field-error" id="email-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-field">
                            <label for="phone">Phone <span>(optional)</span></label>
                            <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" @if ($errors->has('phone')) aria-invalid="true" aria-describedby="phone-error" @endif>
                            @error('phone')<span class="field-error" id="phone-error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-field">
                        <label for="message">Your message</label>
                        <textarea id="message" name="message" rows="5" required @if ($errors->has('message')) aria-invalid="true" aria-describedby="message-error" @endif>{{ old('message') }}</textarea>
                        @error('message')<span class="field-error" id="message-error">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class="button button-primary">Send your message <i class="fa-solid fa-paper-plane" aria-hidden="true"></i></button>
                    <p class="form-note">Your details are used only to respond to your message. Email delivery is not connected on this demo site.</p>
                </form>
            </div>
        </div>
    </section>
@endsection
