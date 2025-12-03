# Health & Fitness (Symfony)

A small Symfony 6.4 application for managing products, services, reservations, orders and users.

## Overview

- Purpose: demo / small e-commerce-like health and fitness site with cart and reservation features.
- Framework: Symfony 6.4
- PHP: >= 8.1

## Repository Structure

- `src/` — PHP source code (controllers, kernel)
- `templates/` — Twig templates
- `public/` — Document root (front controller `index.php`)
- `config/` — Symfony configuration
- `var/`, `vendor/` — runtime and dependencies

## Requirements

- PHP 8.1 or newer
- Composer
- (Optional) Symfony CLI for local server convenience

## Install

Open a terminal in the project root and run:

```powershell
composer install
cp .env .env.local
# Edit .env.local to configure environment variables (e.g. DATABASE_URL) if needed
```

On Windows PowerShell you can copy the env file with:

```powershell
Copy-Item .env .env.local
```

## Run (development)

If you have the Symfony CLI installed:

```powershell
symfony server:start
```

Or use PHP's built-in server (for quick testing):

```powershell
php -S 127.0.0.1:8000 -t public
```

Then open `http://127.0.0.1:8000` in your browser.

## Environment & Database

This project does not include a specific database dependency by default. If you add Doctrine or another persistence layer:

- Set `DATABASE_URL` in `.env.local`.
- Run migrations or schema commands provided by your chosen ORM.

## Common Commands

- Install dependencies: `composer install`
- Clear cache: `php bin/console cache:clear`
- Run migrations (if using Doctrine): `php bin/console doctrine:migrations:migrate`

## Tests

No tests are included by default. To add tests, install PHPUnit and create tests under `tests/`.

## Contributing

Feel free to open issues or submit pull requests. Keep changes focused and add tests where appropriate.

## License

Proprietary (see `composer.json`).

---

File created: `README.md`
