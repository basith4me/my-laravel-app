
# Laravel Project Setup

## Requirements

- PHP >= 7.3
- Composer
- MySQL or any other supported database
- Node.js and npm

## Installation

1. Clone the repository:

   git clone https://github.com/basith4me/my-laravel-app.git
   cd my-laravel-app
   
2. Install dependencies:

   composer install
   npm install
   npm run dev

3. Set up the environment file:

   Copy the `.env.example` file to `.env` and update the environment variables as needed.
   cp .env.example .env


4. Generate the application key:

   php artisan key:generate
   

## Database Setup

1. Create a database:

   Create a new database for your application. You can use any database management tool like phpMyAdmin, MySQL Workbench, or command line.

   CREATE DATABASE my_laravel_app;
   

2. Update the `.env` file:

   Update the database configuration in the `.env` file with your database credentials.

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=my_laravel_app
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   

3. Run database migrations:
   
   php artisan migrate

## Running the Application

1. Start the development server:

   php artisan serve
  

2. Access the application:

   Open your web browser and navigate to `http://localhost:8000`.

You have successfully set up the Laravel project and configured the database.