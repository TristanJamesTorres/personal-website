document.addEventListener('DOMContentLoaded', function () {
    var root = document.documentElement;
    root.classList.add('js-enabled');

    var themeToggle = document.querySelector('.theme-toggle');
    var themeMeta = document.querySelector('meta[name="theme-color"]');

    var syncThemeControl = function () {
        var isDark = root.dataset.theme === 'dark';
        if (themeToggle) {
            themeToggle.setAttribute('aria-checked', String(isDark));
            themeToggle.setAttribute('title', isDark ? 'Switch to light mode' : 'Switch to dark mode');
        }
        if (themeMeta) {
            themeMeta.setAttribute('content', isDark ? '#19171d' : '#f7f3e9');
        }
    };

    syncThemeControl();

    document.addEventListener('click', function (event) {
        if (!(event.target instanceof Element)) {
            return;
        }

        var backToTop = event.target.closest('.back-to-top');
        if (!backToTop) {
            return;
        }

        event.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth'
        });
    });

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
            try {
                window.localStorage.setItem('tj-theme', root.dataset.theme);
            } catch (error) {
                // The selected theme still applies for this page if storage is unavailable.
            }
            syncThemeControl();
        });
    }

    var menuToggle = document.querySelector('.nav-toggle');
    var nav = document.querySelector('.main-nav');

    if (menuToggle && nav) {
        var closeMenu = function (returnFocus) {
            nav.classList.remove('is-open');
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Open navigation');
            menuToggle.innerHTML = '<i class="fa-solid fa-bars" aria-hidden="true"></i>';
            if (returnFocus) {
                menuToggle.focus();
            }
        };

        menuToggle.addEventListener('click', function () {
            var isOpen = menuToggle.getAttribute('aria-expanded') !== 'true';
            nav.classList.toggle('is-open', isOpen);
            menuToggle.setAttribute('aria-expanded', String(isOpen));
            menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation' : 'Open navigation');
            menuToggle.innerHTML = isOpen
                ? '<i class="fa-solid fa-xmark" aria-hidden="true"></i>'
                : '<i class="fa-solid fa-bars" aria-hidden="true"></i>';
        });

        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                closeMenu(false);
            });
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
                closeMenu(true);
            }
        });

        document.addEventListener('click', function (event) {
            if (menuToggle.getAttribute('aria-expanded') === 'true'
                && !nav.contains(event.target)
                && !menuToggle.contains(event.target)) {
                closeMenu(false);
            }
        });
    }

    var dialog = document.querySelector('.lightbox');

    if (dialog && typeof dialog.showModal === 'function') {
        var image = dialog.querySelector('.lightbox-image');
        var title = dialog.querySelector('.lightbox-title');
        var category = dialog.querySelector('.lightbox-category');
        var count = dialog.querySelector('.lightbox-count');
        var currentIndex = 0;
        var lastTrigger = null;

        var showArtwork = function (index) {
            var artworkLinks = Array.from(document.querySelectorAll('[data-lightbox]'));
            if (artworkLinks.length === 0) {
                return;
            }
            currentIndex = (index + artworkLinks.length) % artworkLinks.length;
            var artwork = artworkLinks[currentIndex];
            image.src = artwork.dataset.image;
            image.alt = artwork.dataset.alt || '';
            title.textContent = artwork.dataset.title || '';
            category.textContent = artwork.dataset.category || '';
            count.textContent = (currentIndex + 1) + ' / ' + artworkLinks.length;
        };

        document.addEventListener('click', function (event) {
            var link = event.target.closest('[data-lightbox]');
            if (!link) {
                return;
            }
            event.preventDefault();
            lastTrigger = link;
            showArtwork(Array.from(document.querySelectorAll('[data-lightbox]')).indexOf(link));
            dialog.showModal();
        });

        dialog.querySelector('.lightbox-close').addEventListener('click', function () {
            dialog.close();
        });
        dialog.querySelector('.lightbox-previous').addEventListener('click', function () {
            showArtwork(currentIndex - 1);
        });
        dialog.querySelector('.lightbox-next').addEventListener('click', function () {
            showArtwork(currentIndex + 1);
        });
        dialog.addEventListener('click', function (event) {
            if (event.target === dialog) {
                dialog.close();
            }
        });
        dialog.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && dialog.open) {
                event.preventDefault();
                dialog.close();
            } else if (event.key === 'ArrowLeft') {
                showArtwork(currentIndex - 1);
            } else if (event.key === 'ArrowRight') {
                showArtwork(currentIndex + 1);
            }
        });
        dialog.addEventListener('close', function () {
            if (lastTrigger) {
                lastTrigger.focus();
            }
        });
    }

    var gallerySection = document.querySelector('.gallery-section');
    var galleryNavigation = document.querySelector('.gallery-tabs');

    if (gallerySection && galleryNavigation) {
        var galleryRequest = null;
        var loadGallery = function (url, historyState) {
            if (galleryRequest) {
                galleryRequest.abort();
            }

            var request = new AbortController();
            galleryRequest = request;
            gallerySection.setAttribute('aria-busy', 'true');
            return fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                signal: request.signal
            }).then(function (response) {
                if (!response.ok) {
                    throw new Error('Gallery request failed with status ' + response.status);
                }
                return response.text();
            }).then(function (html) {
                var nextDocument = new DOMParser().parseFromString(html, 'text/html');
                var nextSection = nextDocument.querySelector('.gallery-section');
                if (!nextSection) {
                    throw new Error('Gallery response did not contain the gallery section.');
                }

                var scrollY = window.scrollY;
                gallerySection.replaceWith(nextSection);
                gallerySection = nextSection;
                galleryNavigation = nextSection.querySelector('.gallery-tabs');
                historyState.galleryScrollY = scrollY;
                window.history.replaceState(historyState, '', url);
                window.scrollTo({ top: scrollY, behavior: 'instant' });

                var activeLink = galleryNavigation && galleryNavigation.querySelector('[aria-current="page"]');
                if (activeLink) {
                    activeLink.focus({ preventScroll: true });
                }
            }).catch(function (error) {
                if (error.name === 'AbortError') {
                    return;
                }
                console.error(error);
                window.location.assign(url);
            }).finally(function () {
                if (galleryRequest === request) {
                    gallerySection.removeAttribute('aria-busy');
                    galleryRequest = null;
                }
            });
        };

        window.history.scrollRestoration = 'manual';

        document.addEventListener('click', function (event) {
            var link = event.target.closest('.gallery-tabs a');
            if (!link || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
                return;
            }
            if (link.hasAttribute('aria-current')) {
                event.preventDefault();
                return;
            }

            var url = new URL(link.href);
            if (url.origin !== window.location.origin || url.pathname !== window.location.pathname) {
                return;
            }

            event.preventDefault();
            var state = Object.assign({}, window.history.state, { galleryScrollY: window.scrollY });
            window.history.replaceState(state, '', window.location.href);
            window.history.pushState({ galleryScrollY: window.scrollY }, '', url);
            loadGallery(url, window.history.state);
        });

        window.addEventListener('popstate', function (event) {
            var state = event.state || { galleryScrollY: window.scrollY };
            loadGallery(window.location.href, state);
        });
    }

    var focusTarget = document.querySelector('[data-focus-on-load]');
    if (focusTarget) {
        focusTarget.focus();
    }

    var revealItems = document.querySelectorAll('[data-reveal]');
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches
        || !('IntersectionObserver' in window)) {
        revealItems.forEach(function (item) {
            item.classList.add('is-visible');
        });
        return;
    }

    var revealObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -28px 0px' });

    revealItems.forEach(function (item) {
        revealObserver.observe(item);
    });
});
