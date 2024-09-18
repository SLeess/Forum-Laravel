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
- API architecture application.
- Optimizations in the API architecture.
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

6. **API Development**: The API is a crucial part of the system, providing endpoints for interacting with the support tickets programmatically. The following API routes are available:
- `GET /api/example`
  - **Description**: A test route to verify that the API is working.
  - **Response**: `{"message": "API route is working"}`

- `GET /api/supports`
  - **Description**: Retrieves a list of all support tickets.
  - **Controller**: `Api\SupportController@index`

- `POST /api/supports`
  - **Description**: Creates a new support ticket.
  - **Controller**: `Api\SupportController@store`

- `GET /api/supports/{support}`
  - **Description**: Retrieves details of a specific support ticket.
  - **Controller**: `Api\SupportController@show`

- `PUT /api/supports/{support}`
  - **Description**: Updates an existing support ticket.
  - **Controller**: `Api\SupportController@update`

- `DELETE /api/supports/{support}`
  - **Description**: Deletes a support ticket.
  - **Controller**: `Api\SupportController@destroy`

## Routes

The application includes the following routes:

- `GET /`: Displays the index page with a list of support tickets.
- `GET /supports/create`: Shows the form to create a new support ticket.
- `POST /supports/store`: Submits the form to store a new support ticket.
- `GET /supports/{id}/edit`: Displays the form to edit an existing support ticket.
- `PUT /supports/{id}`: Updates the support ticket.
- `GET /supports/{id}`: Shows details of a specific support ticket.
- `DELETE /supports/{id}`: Deletes a support ticket.

## API Routes

The application also includes the following API routes:

- `GET /api/example`: Returns a JSON response to verify the API is working.
- `GET /api/supports`: Retrieves a list of all support tickets.
- `POST /api/supports`: Creates a new support ticket.
- `GET /api/supports/{support}`: Retrieves details of a specific support ticket by its ID.
- `PUT /api/supports/{support}`: Updates the support ticket with the specified ID.
- `DELETE /api/supports/{support}`: Deletes the support ticket with the specified ID.

Other system routes include:

- `GET /api/user`: Retrieves the authenticated user.
- `GET /sanctum/csrf-cookie`: Fetches the CSRF token for authentication.


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

---

### Steps to Install and Configure Docker + Laravel from Scratch

#### 1. **Install Docker**
   - **On Windows / macOS**: 
     - Download and install [Docker Desktop](https://www.docker.com/products/docker-desktop).
     - Follow the installation instructions and restart your PC after installation.
   - **On Linux**:
     - Follow the installation instructions on the official Docker website for your Linux distribution ([Docker Linux Install](https://docs.docker.com/engine/install/)).

#### 2. **Install Docker Compose**
   - Docker Compose is generally included with Docker on Windows and macOS. If you're using Linux and Docker Compose is not installed, you can manually install it:
     ```bash
     sudo apt update
     sudo apt install docker-compose
     ```

#### 3. **Set Up Laravel from Scratch with Docker**

##### 1. **Create a Laravel Project or Clone an Existing One**

   - **If you already have a Laravel project on GitHub**:
     ```bash
     git clone https://github.com/SLeess/Forum-Laravel.git
     cd Forum-Laravel
     ```

   - **Or if you want to create a Laravel project with Docker from scratch**:
     ```bash
     curl -s "https://laravel.build/Forum-Laravel?with=mysql,redis,mailpit" | bash
     cd Forum-Laravel
     ```

##### 2. **Check if Docker is Active and Running**
   - Ensure Docker is running properly:
     ```bash
     docker --version
     docker-compose --version
     ```


#### 3. **Ensure Docker is Running and Install Composer Dependencies**

   Once Docker and Docker Compose are installed, you should confirm that Docker is running properly. After that, it's crucial to install the project's dependencies, especially when working with Laravel. To do this, you will use Docker to run Composer inside a container.

   - Run the following command:
     ```bash
        docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v $(pwd):/var/www/html \
       -w /var/www/html \
       laravelsail/php82-composer:latest \
       composer install
        ```

   - This process may take some time, probably more than 1200 seconds

##### 4. **Set Up the `.env` File**
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```

   - Open the `.env` file and modify the variables:
     - Set the application name.
     - Configure the database port and credentials.
     - And set this property:
     ```bash
     WWWUSER=1000
     WWWGROUP=1000
     ```

##### 5. **Start Docker Containers**
   - Navigate to the Laravel project directory and start the containers:
     ```bash
     docker-compose up -d
     ```

   - This process may take some time, like 1200 or more.

   - **If you encounter a "path not found" error**, run the following command to ensure the dependencies are installed:
     ```bash
     docker-compose exec laravel.test composer install
     ```

##### 6. **Generate the Application Key**
   - Generate the Laravel application key:
     ```bash
     docker-compose exec laravel.test php artisan key:generate
     ```

##### 7. **Run the Migrations**
   - Run the database migrations:
     ```bash
     docker-compose exec laravel.test php artisan migrate
     ```

##### 8. **Set Folder Permissions**
   - Ensure the permissions are correct:
     ```bash
     docker-compose exec laravel.test chmod -R 775 storage
     docker-compose exec laravel.test chmod -R 775 bootstrap/cache
     ```

   - Or maybe this in the same docker:
     ```bash
     chmod -R gu+w storage
     chmod -R guo+w storage
     php artisan cache:clear
     ```

##### 9. **Restart the Containers**
   - Restart the containers after everything is configured:
     ```bash
     docker-compose down
     docker-compose up -d
     ```

##### 10. **Access the Application**
   - Open your browser and navigate to `http://localhost:<port_defined_in_env>` to access the Laravel application.

### Common Issues and Solutions
1. **Missing dependencies error (vendor)**:
   - Ensure you run the `composer install` command inside the container.
   - If the issue persists, run:
     ```bash
     docker-compose exec laravel.test composer update
     ```

2. **Permission error**:
   - Check the permissions for the `storage` and `bootstrap/cache` folders. If necessary, use the `chmod` command as shown in step 7.

## Contact

For more information, contact me through the support page, or send an email to duraesleandro12@gmail.com

---
