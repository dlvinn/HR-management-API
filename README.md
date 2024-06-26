# Project Setup Documentation

## Introduction

This document provides instructions for setting up and configuring the project environment for the **HR management System** project. It includes steps for installing dependencies, configuring the environment, running migrations, and starting the development server.

## Prerequisites

Before setting up the project, ensure that the following prerequisites are met:

- PHP >= 7.4
- Composer


## Installation Steps

Follow these steps to set up the project:

1. **Clone the Repository**: Clone the project repository from the GitHub repository using the following command:

    ```bash
    git clone <repository-url>
    ```

2. **Install Dependencies**: Navigate to the project directory and install PHP dependencies using Composer:

    ```bash
    cd project-directory
    composer install
    ```

3. **Environment Configuration**: Create a copy of the `.env.example` file and name it `.env`. Update the configuration variables in the `.env` file according to your environment settings, including database credentials and application key.

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**: Generate an application key for the Laravel application using the following command:

    ```bash
    php artisan key:generate
    ```

5. **Database Setup**: Create a new database for the project and update the database configuration in the `.env` file with the appropriate credentials.
6. **Database Connection Details**
    - **Database System:** PostgreSQL
    - **Host:** 127.0.0.1
    - **Port:** 5432
    - **Database Name:** hr_management
    - **Username:** postgres
    - **Password:** *****

7. **Run Migrations**: Run database migrations to create the necessary tables in the database:

    ```bash
    php artisan migrate
    ```

8. **Start Development Server**: Finally, start the development server to run the Laravel application locally:

    ```bash
    php artisan serve
    ```

9. **Access the Application**: Open a web browser and navigate to the URL provided by the `php artisan serve` command to access the application.


10. **to run the migration and seeder**:
 ```bash
 php artisan migrate --seed
## Testing

To run tests for the project, execute the following command:

```bash
php artisan test
