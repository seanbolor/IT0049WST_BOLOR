# Tasks for Today Management System

A CodeIgniter 4 task-management application developed for IT0049 Web System Technologies.

The application demonstrates MVC organization, database Models, Query Builder filtering, routes, reusable views, and MySQL integration.

## Features

- Welcome page showing only today's tasks
- Complete task list ordered by date
- Demo user profile
- Static developer information page
- Responsive user interface
- MySQL database integration

## Pages

- `/` - Today's tasks
- `/tasks` - Complete task list
- `/profile` - Demo user profile
- `/about` - Developer information

## Requirements

- PHP 8.2 or later
- Composer
- MySQL or MariaDB
- CodeIgniter 4
- XAMPP may be used for local development

## Local Setup

1. Start Apache and MySQL through XAMPP.
2. Open phpMyAdmin.
3. Import `database/it0049_tsa1.sql`.
4. Copy `env` to `.env` if `.env` does not exist.
5. Configure the database settings in `.env`:

```ini
database.default.hostname = localhost
database.default.database = it0049_tsa1
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306

## Hosted Link

https://it0049-bolor-tasks.gt.tc/