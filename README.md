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

To start the Laravel project using Docker, run the following command in your Ubuntu terminal:

```bash
curl -s "https://laravel.build/<PROJECT_NAME>?with=mysql,redis,mailpit" | bash
```

If `curl` is not installed, you can install it with:

```bash
sudo apt install curl -y
```

To address potential permission issues, run:

```bash
chmod -R gu+w storage
chmod -R guo+w storage
php artisan cache:clear
```
<!--
## Project Screenshots

<a target="_blank" align="center" style="display: inline-block;">
  <img align="left" top="500" width="550" alt="png" src="https://i.imgur.com/zkQEkb2.png">
</a>

<!> A Home page of this project with some previously entered data
<br><br><br>
In the same image, you can see a navbar adapted from Livewire, enabling Login, registration, and configuration of the profile in use, in addition to, of course, using the system's functionalities to register events.
<br><br><br><br>-->

## Contact

For more information, contact me through the support page, or send an email to duraesleandro12@gmail.com

---
