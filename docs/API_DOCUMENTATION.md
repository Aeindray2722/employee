# Employee API Documentation

## Base URL

```text
http://localhost:8000/graphql
```

---

# Authentication

## Login

### Mutation

```graphql
{
  "query": "mutation { login(username: \"test@example.com\", password: \"password\") { token } }"
}
```

### Response

```json
{
  "data": {
    "login": {
      "token": "access_token_here"
    }
  }
}
```

### Notes

* Accepts email or username.
* Returns Passport access token.
* Token is required for protected operations.

Header:

```http
Authorization: Bearer ACCESS_TOKEN
```

---

# Employee Fields

| Field      | Type   | Required |
| ---------- | ------ | -------- |
| first_name | String | Yes      |
| last_name  | String | Yes      |
| email      | String | Yes      |
| phone      | String | Yes      |
| address    | String | Yes      |
| salary     | Float  | Yes      |

---

# Queries

## Get Employee

Returns a single employee.

### Query

```graphql
{
  "query": "query { employee(id: 1) { id first_name last_name email phone address salary } }"
}
```

### Arguments

| Name | Type | Required |
| ---- | ---- | -------- |
| id   | ID   | Yes      |

---

## Get Employees

Returns paginated employee records.

### Query

```graphql
{
  "query": "query { employees(page:2, first:20) { data { id first_name last_name email } paginatorInfo { currentPage lastPage total } } }"
}
```

### Arguments

| Name  | Type | Required |
| ----- | ---- | -------- |
| page  | Int  | No       |
| first | Int  | No       |

---

# Mutations

## Create Employee

Authentication Required: Yes

### Mutation

```graphql
{
  "query": "mutation { createEmployee(first_name: \"Aein\", last_name: \"Dray\", email: \"aeindray@example.com\", phone: \"+123456789\", address: \"123 Main Street\", salary: 2500) { id email } }"
}
```

### Required Fields

| Name       | Type   |
| ---------- | ------ |
| first_name | String |
| last_name  | String |
| email      | String |
| phone      | String |
| address    | String |
| salary     | Float  |

---

## Update Employee

Authentication Required: Yes

### Mutation

```graphql
{
  "query": "mutation { updateEmployee(id: 1, first_name: \"Aeindray\", last_name: \"Soe\", email: \"aeindraysoe@example.com\", phone: \"+987654321\", address: \"456 New Street\", salary: 3000) { id email } }"
}
```

### Required Fields

| Name | Type |
| ---- | ---- |
| id   | ID   |

Other fields are optional depending on implementation.

---

## Delete Employee

Authentication Required: Yes

### Mutation

```graphql
{
  "query": "mutation { deleteEmployee(id: 1) { id } }"
}
```

### Arguments

| Name | Type | Required |
| ---- | ---- | -------- |
| id   | ID   | Yes      |

---

## Generate Employees

Authentication Required: Yes

Creates fake employee records.

### Mutation

```graphql
{
  "query": "mutation { generateEmployees(count: 10000) }"
}
```

### Arguments

| Name  | Type | Required |
| ----- | ---- | -------- |
| count | Int  | Yes      |

---

## Import Employees

Authentication Required: Yes

Imports employees from Excel.

### Required Columns

```text
first_name
last_name
email
phone
address
salary
```

### Postman Configuration

Form Data:

Key: operations

```json
{
  "query": "mutation ($file: Upload!) { importEmployees(file: $file) }",
  "variables": {
    "file": null
  }
}
```

Key: map

```json
{
  "0": ["variables.file"]
}
```

Key: 0

```file
Select Excel file.
```

### Mutation

```graphql
{
  "query": "mutation ($file: Upload!) {importEmployees(file: $file)}"
}
```
---

## Export Employees

Authentication Required: Yes

Exports employee records to Excel.

### Mutation

```graphql
{
  "query": "mutation { exportEmployees }"
}
```

### Response

```json
{
  "data": {
    "exportEmployees": "/storage/employees.xlsx"
  }
}
```

---

# Error Handling

## Authentication Error

```json
{
  "errors": [
    {
      "message": "Unauthenticated."
    }
  ]
}
```

## Validation Error

```json
{
  "errors": [
    {
      "message": "The email has already been taken."
    }
  ]
}
```

---

# Sample Excel File

Location:

```text
docs/sample-employees.xlsx
```

Expected columns:

```text
first_name
last_name
email
phone
address
salary
```
