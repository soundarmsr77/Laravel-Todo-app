## Todo App

This project is a Todo list application built using Laravel.

![TodoApp](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/446c56c6-c917-4028-b79d-c957769fd42e)
![TodoApp_add_validate](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/0abe8e2b-122f-49d6-9521-9334e80b8a44)
![TodoApp_add](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/76657f57-1f4c-4f85-a247-8649a91bffaf)
![TodoApp_edit](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/5b8bea22-a0f7-4906-82de-6d4516d67962)
![TodoApp_edit](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/342cd584-32ba-44aa-b532-609dda45b8e5)
![TodoApp_view](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/1354fb16-95c9-49f1-b15e-74fbda7210e5)
![TodoApp_delete](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/33a9a46c-5829-46b5-9d7c-21a51282b5e4)
![TodoApp_completed](https://github.com/soundarmsr77/Laravel-Todo-app/assets/167417356/068e9430-8902-48fa-896a-319674d5025b)


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


