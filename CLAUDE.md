# Repository guidance

## Project

Laravel 12 personal portfolio for Tristan James Torres, a self-taught artist, web designer, and Information Technology student. Pages: Home, About, Gallery, and Contact.

## MVC and content

- Routes live in `routes/web.php` and call `App\Http\Controllers\PageController`.
- Profile, biography, category metadata, and gallery item data are private array methods in `PageController`.
- Gallery images supplied with the laboratory exercise are in `public/images/` and use numbered filenames.
- Views live in `resources/views` and extend `layouts/app.blade.php`.
- Keep HTML in Blade templates and controller data in controller methods; routes should remain declarative.

## Design system

- Main colors: desaturated purple, pale yellow, and cream.
- Typography: Audiowide and DM Sans from Google Fonts; iconography: Font Awesome.
- The home hero uses readable cursive lettering and `public/images/tristan-cutout.png` as its focal portrait.
- The shared header uses the supplied SVG logo as a CSS mask tinted by semantic theme tokens. Keep the logo-color token updated for both themes.
- Keep buttons, icon controls, theme toggle, and gallery filter controls angular with the shared `--control-radius` token.
- Light and dark semantic tokens are defined in `resources/css/base.css`.
- `resources/css/app.css` imports the focused CSS modules in cascade order; mirror each stylesheet under `public/css/` because the layout serves the public entry point directly.
- JavaScript is mirrored to `public/js/app.js` for the same direct-serving setup.
- The theme switch follows system preference on first visit and persists the explicit selection in local storage.
- Motion must respect `prefers-reduced-motion`; keep interactive controls keyboard accessible.

## Validation

Run `php artisan test` after changing routes, controller data, forms, or views.
