## Todo App

This project is a Todo list application built using Laravel.


### Features

- **Create Todo:** Users can add new todo list(Title, description)
- **Update Todo:** Users can edit existing todo list by clicking on them and modifying the data.
- **Delete Todo:** Users can remove todo list by clicking on the delete button next to each data.
- **Mark Todo as Completed:** Users can mark todo items as completed by clicking on the checkbox next to each item.
- **Pagination:** Todo items are paginated to improve user experience and performance.


### Getting Started

To run this project locally, follow these steps:

1. Laravel setup using composer:

   ```bash
   composer create-project laravel/laravel todoapp --prefer-dist
   ```

2. Navigate to the project directory:

   ```bash
   cd todoapp
   ```

3. Copy the `.env.example` file and create a new `.env` file:

   ```bash
   cp .env.example .env
   ```

4. Generate an application key:

   ```bash
   php artisan key:generate
   ```

5. Configure the database connection in the `.env` file:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

6. Run database migrations:

   ```bash
   php artisan migrate
   ```


7. Start the development server:

   ```bash
   php artisan serve
   ```

8. Open your browser and visit `http://localhost:8000` to view the application.


