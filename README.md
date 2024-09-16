<p align="center">
 <img width="100px" src="public/img/logo.svg" align="center" alt="Logo" />
 <h2 align="center">Support System</h2>

> [!NOTE]\
> This project is currently under development. Some features may be incomplete or inactive.
> Created by [@SLeess](https://github.com/SLeess)
</p>

## Overview

The Support System is a web application built with Laravel, designed to manage support tickets efficiently. It includes features for creating, editing, and viewing support tickets, as well as managing them via a user-friendly interface. The system employs best practices in software development, including a service-oriented architecture, security measures, and pagination for improved usability.

## Features

- Create, edit, and delete support tickets.
- View individual support ticket details.
- Dashboard to manage support tickets for authenticated users.
- User authentication to access restricted features.
- Adaptation for different screen sizes, ensuring a responsive experience on mobile devices, tablets, and desktops.
- Login system with account register - **(In progress)**
- Filtered search by Dates and Subject - **(In progress)**
- Profile photos for each user incorporated into the page design - **(In progress)**
- Contact with support - **(In progress)**
- Log of past or deleted tickets - **(In progress)**

## Project Architecture

The project follows a well-defined architecture to ensure maintainability and scalability:

1. **Services and Repositories**: The application uses a service-oriented architecture, where business logic is encapsulated within service classes. This approach adheres to the principles of separation of concerns and promotes reusability and testability.

2. **DTOs (Data Transfer Objects)**: DTOs are utilized to encapsulate data transferred between the layers of the application, ensuring that data structures are consistent and manageable.

3. **Security**: Several security measures have been implemented, including validation rules defined in `StoreUpdateSupportRequest` to prevent unauthorized input. This ensures that only valid and safe data is processed.

4. **Pagination**: A pagination system has been integrated to manage large sets of support tickets efficiently, enhancing the user experience by loading data in chunks.

5. **Containerization**: The project uses Docker for containerization, which simplifies setup and deployment. The Docker configuration includes:
   - **Laravel Container**: Contains the Laravel application and is pre-configured with PHP.
   - **MySQL Container**: Manages the database and is set up with environment variables for secure connection.
   - **Redis Container**: Used for caching and session management.
   - **Mailpit Container**: Provides a local email server for development and testing.

## Routes

The application includes the following routes:

- `GET /`: Displays the index page with a list of support tickets.
- `GET /supports/create`: Shows the form to create a new support ticket.
- `POST /supports/store`: Submits the form to store a new support ticket.
- `GET /supports/{id}/edit`: Displays the form to edit an existing support ticket.
- `PUT /supports/{id}`: Updates the support ticket.
- `GET /supports/{id}`: Shows details of a specific support ticket.
- `DELETE /supports/{id}`: Deletes a support ticket.

## Installation
### Setting Up Your Laravel Project with Docker

This guide will help you set up the Laravel Forum project using Docker, clone the project, configure environment variables, and run everything correctly.

## Prerequisites

- **Docker**: Make sure Docker and Docker Compose are installed on your system. You can download them from [Docker's official website](https://www.docker.com/get-started).
- **WSL**: If you're using Windows, ensure you have WSL (Windows Subsystem for Linux) installed.

## Step-by-Step Guide

### 1. **Create Docker Containers**

1. **Open Your Terminal**:
   - If you're using WSL, open your WSL terminal.

2. **Create a Laravel Project with Docker**:
   - Use the following command to create a new Laravel project with Docker. Replace `<PROJECT_NAME>` with your desired project name:
     ```bash
     curl -s "https://laravel.build/<PROJECT_NAME>?with=mysql,redis,mailpit" | bash
     ```

3. **Navigate to Your Project Directory**:
   - Change to the directory of your newly created project:
     ```bash
     cd <PROJECT_NAME>
     ```

### 2. **Clone Your Existing Project**

1. **Clone Your Project Repository**:
   - Replace `<REPOSITORY_URL>` with the URL of your Git repository:
     ```bash
     git clone <REPOSITORY_URL> .
     ```

2. **Ensure the `.env` File Exists**:
   - Copy the example environment file to `.env`:
     ```bash
     cp .env.example .env
     ```

### 3. **Configure Environment Variables**

1. **Set Environment Variables**:
   - Open the `.env` file in your project's root directory and add or verify the following environment variables:
     ```env
     WWWUSER=1000
     WWWGROUP=1000
     ```

2. **Update `docker-compose.yml`**:
   - Ensure the `docker-compose.yml` file includes these environment variables under the `laravel.test` service:
     ```yaml
     services:
       laravel.test:
         build:
           context: ./vendor/laravel/sail/runtimes/8.3
           dockerfile: Dockerfile
           args:
             WWWUSER: '${WWWUSER}'
             WWWGROUP: '${WWWGROUP}'
         ...
     ```

### 4. **Build and Start Docker Containers**

1. **Build Docker Containers**:
   - Run the following command to build the Docker containers:
     ```bash
     docker-compose build
     ```

2. **Start Docker Containers**:
   - Start the containers in detached mode:
     ```bash
     docker-compose up -d
     ```

### 5. **Install Composer Dependencies**

1. **Install Dependencies**:
   - Execute the following command to install Composer dependencies inside the Laravel container:
     ```bash
     docker-compose exec laravel.test composer install
     ```

2. **Set Directory Permissions**:
   - Ensure the `storage` and `bootstrap/cache` directories are writable:
     ```bash
     docker-compose exec laravel.test chmod -R 775 storage
     docker-compose exec laravel.test chmod -R 775 bootstrap/cache
     ```

### 6. **Generate Application Key**

- After installing dependencies, generate the application key:
  ```bash
  docker-compose exec laravel.test php artisan key:generate
  ```

### 7. **Verify and Access the Application**

1. **Check Docker Logs**:
   - If it encounter issues, check the logs of the Laravel container:
     ```bash
     docker-compose logs laravel.test
     ```

2. **Access the Application**: 
   - Open the browser and navigate to `http://localhost` to see if your Laravel application is running correctly.

## Contact

For more information, contact me through the support page, or send an email to duraesleandro12@gmail.com

---
