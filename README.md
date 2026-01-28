<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

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

User Management API (Laravel)
Project Overview

This project is a User Management REST API built using Laravel, following a clean layered architecture with DAO, BO, Service, and Controller layers.
Caching is implemented to improve performance and reduce database queries.

Features

Create User

Update User

Retrieve User by ID

Clean layered architecture (DAO → BO → Service → Controller)

Request validation using Form Requests

Caching with cache invalidation

Proper HTTP status codes and JSON responses

Project Setup
1. Clone the Repository
git clone <repository-url>
cd user-management-api

2. Install Dependencies
composer install

3. Environment Configuration
cp .env.example .env


Update the database details in .env:

DB_DATABASE=user_management
DB_USERNAME=laravel_user
DB_PASSWORD=password123

4. Generate Application Key
php artisan key:generate

5. Run Database Migrations
php artisan migrate

6. Start the Server
php artisan serve


Base URL:

http://127.0.0.1:8000

API Endpoints
Create User

POST /api/users

Request Body:

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123"
}


Response:

201 Created

Get User by ID

GET /api/users/{id}

Response:

200 OK

404 Not Found

Update User

PUT /api/users/{id}

Request Body:

{
  "name": "John Updated"
}


Response:

200 OK

404 Not Found

Architecture Overview

The application follows a layered architecture:

Controller → Service → BO → DAO → Database

Controller

Handles HTTP requests and responses

Contains no business logic

Service Layer

Controls application flow

Handles caching

Calls the BO layer

BO (Business Object)

Applies business rules

Encrypts passwords

Normalizes data

DAO (Data Access Object)

Handles all database interactions

Contains only database queries

Caching Explanation

Caching is implemented in the Service layer using Laravel’s cache system.

User data is cached when retrieved using Cache::remember()

Cache is invalidated and refreshed when a user is updated using Cache::forget()

Benefits

Faster API responses

Reduced database load

Improved scalability

Laravel file cache is used by default, but it can be easily switched to Redis for production environments.

Validation

Validation is handled using Form Request classes

Keeps controllers clean

Ensures data integrity

Conclusion

This project demonstrates:

Clean Laravel architecture

Separation of concerns

Proper caching strategy

Industry-standard best practices