<footer class="site-footer">
    <div class="wrap">
        <div class="footer-main">
            <div>
                <span class="eyebrow">Have something in mind?</span>
                <h2>Let’s make<br><em>something good.</em></h2>
            </div>
            <a href="{{ route('contact') }}" class="button button-cream">Get in touch <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} {{ $siteName ?? 'Tristan James Torres' }}</span>
            <span>Made with creativity in Laguna, Philippines.</span>
            <a href="#top" class="back-to-top">Back to top <i class="fa-solid fa-arrow-up" aria-hidden="true"></i></a>
        </div>
    </div>
</footer>
