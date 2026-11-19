# Student Registration System with Authentication

This is my Laravel project for our individual exam. It is a simple Student Registration System with a login and registration feature. Users need to create an account and log in before they can access the system.

## What the System Can Do

- Register a new account and log in.
- Add and view student information.
- Add and view departments.
- Add and view courses.
- Add a profile for each student.
- Enroll students in different courses.
- Prevent duplicate records from being added.
- Limit login attempts after 5 incorrect passwords.
- Prevent users who are not logged in from accessing the main system.
- Redirect users after adding records to avoid duplicate submissions when refreshing the page.

## Technologies Used

- PHP
- Laravel 13
- SQLite
- HTML
- CSS

## What You Need Before Running the Project

Make sure you have these installed:

- PHP 8.3 or higher
- Composer
- Laragon

## How to Run the Project

1. Clone the repository:

   ```bash
   git clone https://github.com/mooooo000oo00o/student-auth-exam.git
   ```

2. Go inside the project folder:

   ```bash
   cd student-auth-exam
   ```

3. Install the required packages:

   ```bash
   composer install
   ```

4. Create a copy of the environment file:

   ```powershell
   Copy-Item .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Create the SQLite database file:

   ```powershell
   New-Item database/database.sqlite -ItemType File
   ```

7. Open the `.env` file and make sure the database connection is set to SQLite:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   ```

8. Create the database tables:

   ```bash
   php artisan migrate
   ```

9. Start the Laravel server:

   ```bash
   php artisan serve
   ```

10. Open this link in your browser:

   http://127.0.0.1:8000

## How to Use

1. Register an account first.
2. Log in using your account.
3. Once logged in, you can access the Student Registration System.
4. Add students, departments, courses, and student profiles.
5. Enroll students in courses.
6. Log out when you're done.

## GitHub Repository

https://github.com/mooooo000oo00o/student-auth-exam
