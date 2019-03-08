## About Project

Vuejs product catalog management system where we can do CRUD operations for category and products.

## System Requirement
- xampp (php 7.1)
- install composer
- We are going to use Laravel 5.7
- PHP 7.1 or greater
- Mysql 5.7 or MariaDB latest

## Mysql configuration
- mysql can be configured through .env file, where we can provide host and other details.

## Installations Steps:
- cd catalog
- Run `composer install`
- Run `npm install`
- cp .env.example .env
- Run `php artisan key:generate`
- Create database catalog or change the name in .env file (dont forget to clear the cache)
- Run `php artisan migrate`
- Run `npm run prod`
- Run `php artisan serve --port=8000`
- Now go to url `http://localhost:8000`