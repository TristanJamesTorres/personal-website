# AGENTS.md

This is a standard Laravel 12 application. If you are an AI coding agent working in this repo:

- Routes live in `routes/web.php` and point to `App\Http\Controllers\PageController`.
- Page content (profile info, project list, contact details) is defined as private array
  methods inside `PageController` rather than pulled from a database. This keeps the
  activity's MVC flow easy to trace end-to-end.
- Views live in `resources/views` as Blade templates, extending `layouts/app.blade.php`.
- Styles are hand-written in `resources/css/app.css` (also mirrored into `public/css/app.css`
  so the site works without running a Vite build). If you add new CSS, update both, or wire
  up the Vite build and switch `layouts/app.blade.php` to `@vite(...)`.
- Run `composer install` then `php artisan serve` to preview the site locally.
