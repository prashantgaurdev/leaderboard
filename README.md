

# Leaderboard Application

## Overview

This application allows you to manage a leaderboard of users with functionalities to add, delete, and view users.
## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Installation](#installation)
3. [Running the Application](#running-the-application)
4. [Testing](#testing)
5. [API Endpoints](#api-endpoints)
6. [Contributing](#contributing)

## Prerequisites

- PHP >= 8.0
- Composer
- MySQL or another database

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/leaderboard-app.git
   cd leaderboard-app
   ```

2. **Install PHP Dependencies**

   ```bash
   composer install
   ```

3. **Set Up Environment Variables**

   Copy the `.env.example` file to `.env` and update the database configuration:

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file to match your environment settings (e.g., database connection).

4. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**

   ```bash
   php artisan migrate
   ```

6. **Install JavaScript Dependencies**

   ```bash
   npm install
   ```

7. **Build Assets**

   ```bash
   npm run build
   ```

8. **Start the Development Server**

   ```bash
   php artisan serve
   ```

9. **Access the Application**

   Open your browser and navigate to `http://localhost:8000` to view the application.

## Running the Application

1. **Start Laravel Development Server**

   ```bash
   php artisan serve
   ```

## Testing

Run unit tests for the application using PHPUnit.

1. **Run Tests**

   ```bash
   php artisan test
   ```
\
## API Endpoints

### User Endpoints

- **GET /api/users**
  - **Description:** List all users.
  - **Response:** JSON array of users.

- **POST /api/users**
  - **Description:** Create a new user.
  - **Request Body:** 
    ```json
    {
      "name": "John Doe",
      "age": 30,
      "points": 100,
      "address": "123 Elm St"
    }
    ```
  - **Response:** JSON object of the created user.

- **DELETE /api/users/{id}**
  - **Description:** Delete a user by ID.
  - **Response:** JSON object with a message.

- **GET /api/users/{id}**
  - **Description:** Get user details by ID.
  - **Response:** JSON object with user details.

### Leaderboard Endpoint

- **GET /api/leaderboard**
  - **Description:** Get the list of users sorted by points.
  - **Response:** JSON array of users sorted by points.