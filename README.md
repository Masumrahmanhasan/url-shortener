<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# URL Shortener Service with Laravel

## Overview

This project is a URL shortener application built using Laravel. The application allows users to shorten long URLs, track click counts, and manage their shortened URLs through a dashboard.

### Features:

- **URL Shortening**: Users can submit long URLs to generate a unique short URL.
- **Click Tracking**: Every time a short URL is clicked, the click count is incremented.
- **User Dashboard**: Each authenticated user can view, manage, and track their shortened URLs.
- **Testing**: Full test coverage for the application, ensuring the core functionality is working correctly.
- **Controller and Service Layer**: The application uses a dedicated service (`UrlShortnerService`) to handle the URL shortening logic.

## Project Setup

### Prerequisites

1. PHP >= 8.3
2. Composer
3. MySQL or another supported database
4. Node.js and npm (for frontend setup)

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Masumrahmanhasan/url-shortener.git
    ```

2. Install dependencies:

    ```bash
    cd your-project-name
    composer install
    npm install
    ```

3. Set up the environment file:

    ```bash
    cp .env.example .env
    ```

   Then, configure your database and other environment settings in the `.env` file.

4. Run migrations to set up the database:

    ```bash
    php artisan migrate
    ```

5. (Optional) Seed the database with dummy data:

    ```bash
    php artisan db:seed
    ```

6. Compile frontend assets (if applicable):

    ```bash
    npm run dev
    ```

7. Serve the application:

    ```bash
    php artisan serve
    ```
8. Test The application with pestphp
    ```
    ./vendor/bin/pest
    ```

The app should now be accessible at `http://localhost:8000`.

## Routes

- `GET /redirect/{short_url}`: Redirects to the original URL and increments the click count.
- `POST /shorten`: Accepts a long URL and returns a shortened URL.
- `GET /dashboard`: Displays the user's dashboard with their shortened URLs and click counts.
