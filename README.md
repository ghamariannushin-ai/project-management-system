# Project Management System

A role-based Laravel project management system designed for both **admins** and **normal users**.  
The system allows users to manage their own projects, tasks, and comments, while the admin has access to all data across the platform.

---

## Overview

This application provides a clean and secure environment for managing projects, tasks, and comments based on user roles.

- **Admins** can access and manage all projects in the system, including both admin-created and user-created projects.
- **Normal users** can only create, update, and delete their own projects.

The project is built using Laravel with a clean MVC architecture and follows common backend best practices.

---

## Features

### Authentication
- User registration and login
- Secure authentication system
- Protected routes with middleware

### Admin Panel
- Access to all projects in the system
- View, edit, and delete any project
- Manage all tasks and comments
- Full control over platform data

### User Dashboard
- Create new projects
- Edit only own projects
- Delete only own projects
- Manage personal tasks and comments
- Access restricted to own data only

### Project Management
- Create projects
- View project details
- Edit projects based on access level
- Delete projects based on access level
- Pagination support

### Task Management
- Create tasks
- Update tasks
- Delete tasks
- Link tasks to related projects

### Comment Management
- Add comments to tasks
- View comments
- Edit and delete comments based on permissions

### Validation & Security
- Form validation
- CSRF protection
- Role-based authorization
- Access control for protected resources

---

## User Roles

### Admin
The admin can:
- View all projects
- Edit all projects
- Delete all projects
- Manage users’ projects and admin projects alike
- Access the full system dashboard

### Normal User
A normal user can:
- Create new projects
- Edit only their own projects
- Delete only their own projects
- Manage their own tasks and comments
- Access only their own records

---

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- Eloquent ORM
- Middleware
- Authentication & Authorization

---

## Installation
```bash
git clone https://github.com/your-username/project-management-system.git
cd project-management-system
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate

php artisan migrate --seed
php artisan serve
