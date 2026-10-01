# Tristan James C. Torres — Personal Portfolio

A responsive, multi-page Laravel MVC portfolio for Tristan James C. Torres, based on the supplied laboratory-exercise website and its original photography/artwork.

**Pages:** Home · About · Gallery · Contact  
**Gallery:** 63 traditional-art pieces · 24 digital-art pieces · 17 outfit photographs  
**Design:** Desaturated purple, pale yellow, and cream; Google Fonts Audiowide and DM Sans; Font Awesome icons; saved light/dark theme toggle. The home hero pairs an uppercase wordmark with Tristan's supplied transparent portrait and a soft ground shadow.

## Getting started

```powershell
composer install
php artisan serve
```

Visit `http://127.0.0.1:8000`. The CSS and JavaScript are mirrored under `public/css` and `public/js`, so the site does not require a Vite build to run.

Run the test suite with:

```powershell
php artisan test
```

## Project structure

```text
routes/web.php                           Named page and artwork routes
app/Http/Controllers/PageController.php  Profile, gallery data, filtering, and form validation
resources/views/                         Blade pages, shared layout, and partials
resources/css/app.css                    CSS entry point importing the ordered style modules
resources/css/{base,home,pages,gallery,artwork,contact,footer,responsive}.css
                                         Theme, page, component, and breakpoint styles
resources/js/app.js                      Theme control, navigation, lightbox, and reveal motion
public/images/                           Original supplied profile, logo, and portfolio images
```

The CSS entry point imports focused stylesheets in cascade order. Matching copies live in `public/css/` because the shared layout serves the public entry point directly.

## MVC flow

```text
Browser → named route → PageController action → Blade view + controller data → Browser
```

The gallery is filtered through the `category` and `q` query parameters, and each artwork has a dynamic `/gallery/{slug}` detail route. Contact submissions are validated and acknowledged in the session; outbound email delivery has not been configured.

## Theme and interaction

The light/dark toggle follows the system preference on first visit, remembers the visitor’s choice, and updates the supplied SVG logo to match the active text color. Buttons and gallery filters use angular, lightly rounded corners. The gallery supports category filtering, search, keyboard-operable artwork details, and a lightbox with previous/next controls. Animations respect `prefers-reduced-motion`.
