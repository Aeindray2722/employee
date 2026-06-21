# Employee API

A Laravel + GraphQL backend application for employee management.

## Features

* Employee CRUD operations
* GraphQL API using Lighthouse
* Authentication using Laravel Passport
* Excel import/export using Laravel Excel
* Faker-based employee generation

---

## Technology Stack

* PHP 8.2+
* Laravel 11
* Lighthouse GraphQL
* Laravel Passport
* Laravel Excel
* MySQL

---

## Requirements

* PHP 8.2 or later
* Composer
* MySQL
* Laravel compatible environment

---

## Installation

Clone the project:

```bash
git clone <repository-url>
cd employee-api
```

Install dependencies:

```bash
composer install
```

Copy environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Configure database credentials in `.env`.

Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_api
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seed data:

```bash
php artisan migrate --seed
```

Install Passport:

```bash
php artisan passport:install
```

Create storage link:

```bash
php artisan storage:link
```

Start the application:

```bash
php artisan serve
```

GraphQL endpoint:

```text
http://localhost:8000/graphql
```

---

## Authentication

Obtain an access token using the Login mutation.

Use the returned token in subsequent requests:

```http
Authorization: Bearer YOUR_ACCESS_TOKEN
```

---

## Project Structure

```text
app/
graphql/
database/
routes/
docs/
```

---

## Sample Files

Sample Excel file:

```text
docs/sample-employees.xlsx
```

API documentation:

```text
docs/API_DOCUMENTATION.md
```


Tested Features
✓ Passport Authentication
✓ Employee CRUD
✓ Pagination
✓ Faker Employee Generation (10,000)
✓ Excel Import
✓ Excel Export
✓ GraphQL API
