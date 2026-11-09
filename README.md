# Employee Management System

Standalone Laravel 12 interview project. It is **not** part of Papa Bear.

Administrators can log in and manage employees and departments with full CRUD, search, pagination, validation, and file uploads.

## Features

- Admin login / logout (session authentication)
- Employee registration: name, email, phone, date of birth, gender, address, profile photo
- Department CRUD on a separate `departments` table
- Department dropdown on the employee form (loaded from the database)
- Employee list: name, phone, age, date of birth, department name
- Search by name, email, phone, or department
- Pagination
- Guest users cannot access employee or department pages

## Tech

- Laravel 12, PHP 8.2+
- SQLite by default (easy to run locally)
- MVC: models, form requests, resource controllers, Blade views
- `employees.department_id` belongs to `departments.id`

## Setup

```bash
cd employee-management-system
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Open http://127.0.0.1:8000

## Demo admin

- Email: `admin@example.com`
- Password: `password`

## Database

| Table | Purpose |
| --- | --- |
| `users` | Admin accounts |
| `departments` | Department master data |
| `employees` | Employee records with `department_id` FK |

Seeders:

- `AdminUserSeeder`
- `DepartmentSeeder`
- `EmployeeSeeder`

MySQL is optional. Set `DB_CONNECTION=mysql` and the usual host/database credentials in `.env`, then run `php artisan migrate --seed` again.
