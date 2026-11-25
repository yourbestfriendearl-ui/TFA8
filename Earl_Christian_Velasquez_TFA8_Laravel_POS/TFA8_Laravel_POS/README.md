# Laravel POS Resource Controllers and Authentication

**IT0049 · Technical Formative Assessment 8**  
Student: Earl Christian Velasquez · Section: DX31 · Professor: Tio Christopher Rene

## What this project does

Customer and user account CRUD uses Laravel resource controllers, registered with one `Route::resource()` call for each resource. Both resource routes are inside the `auth` middleware group, so a signed-out visitor is redirected to Breeze's login page. The inherited TFA7 functionality includes customer and user forms, validation, user avatar thumbnail uploads, and sample data. The filled TFA8 assignment document is included in this project folder.

## Setup

Requirements: PHP 8.3+, Composer, Node.js/npm, SQLite, and PHP GD for avatar image processing.

1. Run `composer install` and `npm install`.
2. Copy `.env.example` to `.env`, then run `php artisan key:generate`.
3. Create the SQLite database: `touch database/database.sqlite` (PowerShell: `New-Item database/database.sqlite -ItemType File`).
4. Install Breeze's Blade authentication scaffolding: `php artisan breeze:install blade`.
5. Run `php artisan migrate --seed` and `php artisan storage:link`.
6. Run `npm run build`, then start the server with `php artisan serve`.
7. Visit `/customers` while signed out to verify redirection to login. Log in, then confirm the customer and user lists are accessible.

Demo login: `admin@example.test` / `password`. Change the seeded password before deployment.

## Routes

| Resource | Registration | Controller actions |
|---|---|---|
| Customers | `Route::resource('customers', CustomerController::class)` | index, create, store, show, edit, update, destroy |
| Users | `Route::resource('users', UserController::class)` | index, create, store, show, edit, update, destroy |

The resource route declarations are grouped under `Route::middleware('auth')`. Breeze login and registration routes are loaded separately from `routes/auth.php`.

## Verify access control

1. Open a private browser window and visit `/customers` or `/users`; Breeze should redirect you to `/login`.
2. Sign in with the demo credentials, then revisit either URL; the account listing should load.
3. Use `php artisan route:list` to review the resource route names and middleware.

## Submission links

- GitHub profile: https://github.com/yourbestfriendearl-ui
- Repository URL: add after creating and pushing the project repository.
- Hosted application: add after deployment.

The ZIP contains source code, migration and seeder files, and the filled assignment document. Composer and npm dependencies are installed during setup and are not bundled.
