# Laravel Blog System

Laravel-based blogging platform featuring public-facing pages, blog management tools, and user engagement workflows such as comments, newsletter subscriptions, and contact forms.

## Features
- Public landing page with featured slider and category filtering for blog discovery.
- Authenticated blog authoring: create, edit, update images, and delete posts with ownership checks.
- Category-specific listings and dedicated single-post view displaying comments.
- Newsletter subscription handling backed by validation and persistent storage.
- Contact form submissions captured through server-side validation.
- Comment submission flow with validation for reader engagement.

## Tech Stack
- PHP 8.1+
- Laravel 10 framework with Laravel Breeze authentication scaffolding
- MySQL (or any Laravel-supported database) for persistence
- Laravel Sanctum for API/session security foundations
- Laravel Sail (optional) for containerized local setup
- Laravel Pint and PHPUnit for code style and automated testing

## Getting Started

### Prerequisites
- PHP 8.1 or newer with required extensions (`openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`)
- Composer
- Node.js & npm (for compiling front-end assets if you customize styles/scripts)
- A MySQL-compatible database

### Installation
1. Clone the repository and install PHP dependencies:
   ```sh
   git clone https://github.com/your-org/blog-system.git
   cd blog-system
   composer install
   ```
2. Copy the environment template and generate the application key:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure `.env` with your database credentials, mail settings (for contact confirmations if desired), and other environment-specific values.
4. Run database migrations (and seeds if you add them):
   ```sh
   php artisan migrate
   ```
5. (Optional) Link the storage directory if you plan to upload blog images:
   ```sh
   php artisan storage:link
   ```
6. Install front-end dependencies and compile assets:
   ```sh
   npm install
   npm run dev
   ```

### Running the Application
- Start the local development server:
  ```sh
  php artisan serve
  ```
- Visit `http://localhost:8000` in your browser to explore the theme pages.
- Authenticate via Laravel Breeze routes to access authoring features (`/login`, `/register`).

## Project Structure Highlights
- `routes/web.php` – route registrations for theme pages, blog CRUD, comments, subscriptions, and contact form.
- `app/Http/Controllers` – controllers handling theme views, blog management, comment persistence, and supporting flows.
- `app/Http/Requests` – form request classes encapsulating validation rules for blogs, comments, subscribers, and contact submissions.
- `resources/views/theme` – Blade templates for the theme layout, including partials and blog presentation components.

## Testing & Quality
- Run PHPUnit tests (add suites as needed):
  ```sh
  php artisan test
  ```
- Enforce code style with Laravel Pint:
  ```sh
  ./vendor/bin/pint
  ```

## Deployment Notes
- Ensure `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
- Configure queue, cache, and filesystem drivers according to your infrastructure.
- Set up a scheduler for periodic tasks (`php artisan schedule:run`) if you enable queued emails or other cron-based features.
- Serve the application via a production-ready web server (e.g., Nginx/Apache) pointing to the `public` directory.

## License

This project is released under the MIT License. See the `LICENSE` file for more information.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
