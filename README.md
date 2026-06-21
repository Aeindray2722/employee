# Employee API

This project is a Laravel + GraphQL backend for managing employees. It uses:

- Laravel Lighthouse (GraphQL API)
- Laravel Passport (Authentication)
- Laravel Excel (Import/Export)
- Faker (Sample data generation)

---

## Requirements

- PHP 8.2+
- Composer
- Laravel 11+
- Database (MySQL / SQLite / PostgreSQL)

---

## Setup

1. Install dependencies
   ```bash
   composer install
   ```
2. Copy the environment file
   ```bash
   cp .env.example .env
   ```
3. Generate the application key
   ```bash
   php artisan key:generate
   ```
4. Run migrations and seed sample data
   ```bash
   php artisan migrate --seed
   ```
5. Install Passport
   ```bash
   php artisan passport:install
   ```
6. Start the server
   ```bash
   php artisan serve
   ```

## Database Setup

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_api
DB_USERNAME=root
DB_PASSWORD=


## Authentication

Use the `login` mutation to obtain a Passport token.

### Login
```graphql

{
  "query": "mutation { login(username: \"test@example.com\", password: \"password\") { token } }"
}

```

Send the token in the `Authorization: Bearer <token>` header for protected requests.

## GraphQL API

### Employee queries

Get one employee:
```graphql
{
  "query": "query { employee(id: 1) { id first_name last_name email phone address salary } }"
}
```

Get paginated employees:
```graphql
{
  "query": "query { employees(page:2, first:20) { data { id first_name last_name email } paginatorInfo { currentPage lastPage total } } }"
}
```

### Employee mutations

Create employee:
```graphql
{
  "query": "mutation { createEmployee(first_name: \"Aein\", last_name: \"Dray\", email: \"aeindray@example.com\", phone: \"+123456789\", address: \"123 Main Street\", salary: 2500) { id email } }"
}
```

Update employee:
```graphql
{
  "query": "mutation { updateEmployee(id: 1, first_name: \"Aeindray\", last_name: \"Soe\", email: \"aeindraysoe@example.com\", phone: \"+987654321\", address: \"456 New Street\", salary: 3000) { id email } }"
}
```

Delete employee:
```graphql
{
  "query": "mutation { deleteEmployee(id: 1) { id } }"
}
```

### Generate sample employees

```graphql
{
  "query": "mutation { generateEmployees(count: 10000) }"
}
```

### Import employees from Excel

```graphql
Body → form-data

Key: operations
{
  "query": "mutation ($file: Upload!) { importEmployees(file: $file) }",
  "variables": {
    "file": null
  }
}

Key: map
{
  "0": ["variables.file"]
}
Key: 0 → (choose file)
```

Excel Columns Required:
- first_name
- last_name
- email
- phone
- address
- salary

### Export employees to Excel

```graphql
{
  "query": "mutation { exportEmployees }"
}
```

The response returns a public URL for the generated file.

## Sample template

A sample Excel template is available in docs/sample-employees.xlsx

## Notes

- Login accepts email or username
- Employee email must be unique
- All mutations (create/update/delete) require authentication
- Token must be sent in Authorization header


---

#  DONE


