# SwiftPOS - TFA3

A CodeIgniter 4 Point-of-Sale account management application developed for IT0049 Web System Technologies.

## Developer

Sean Liam A. Bolor

## Features

- View customer and user account records
- Create customer accounts
- Validate required customer name and valid email address
- Edit existing customer accounts
- Create user accounts
- Validate required and unique usernames
- Edit existing user accounts
- Upload JPG or PNG profile pictures
- Reject images larger than 2 MB
- Generate random filenames for uploaded images
- Resize and crop avatars to 300 x 300 pixels
- Display uploaded avatars or a default placeholder

## Requirements

- PHP 8.2 or newer
- MySQL or MariaDB
- Composer
- PHP GD extension for image processing

## Local Setup

1. Clone or download the repository.
2. Open the `TFA3` directory.
3. Install the PHP dependencies:

```bash
composer install
```

4. Create a MySQL database named:

```text
it0049_tfa3
```

5. Import:

```text
database/it0049_tfa3.sql
```

6. Create a `.env` file and configure:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'
app.appTimezone = 'Asia/Manila'

database.default.hostname = localhost
database.default.database = it0049_tfa3
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

7. Start the development server:

```bash
php spark serve
```

8. Open:

```text
http://localhost:8080/
```

## Application Routes

| Method | Route | Description |
|---|---|---|
| GET | `/` | POS homepage |
| GET | `/about` | About page |
| GET | `/customers` | Customer account listing |
| GET | `/customers/new` | New customer form |
| POST | `/customers` | Save a new customer |
| GET | `/customers/{id}/edit` | Edit customer form |
| POST | `/customers/{id}` | Update a customer |
| GET | `/users` | User account listing |
| GET | `/users/new` | New user form |
| POST | `/users` | Save a new user |
| GET | `/users/{id}/edit` | Edit user and avatar form |
| POST | `/users/{id}` | Update a user and avatar |

## File Upload Rules

- Only JPG, JPEG, and PNG files are accepted.
- Maximum file size is 2 MB.
- Uploaded files receive randomly generated filenames.
- Images are resized and cropped to 300 x 300 pixels.
- Files are stored in `public/uploads`.
- Only the generated filename is stored in the database.

## Database Tables

- `customers`
- `users`

The `users` table includes an `avatar` column for storing the generated avatar filename.

## Hosted Application

https://it0049-bolor-tfa3.gt.tc/