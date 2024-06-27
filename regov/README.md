# Website Project README

This project is a web application built using Laravel for the backend API and Vue.js for the frontend. It includes user authentication, registration, profile management, and basic error handling. Below is a brief overview of the project structure, functionality, and setup instructions.

## Project Structure

### Backend (Laravel):

- **Controllers:** Handles API endpoints for user authentication (AuthController), user registration (AuthController@register), profile updates (AuthController@update), and logout (AuthController@logout).
- **Models:** Defines the User model with attributes like name, email, and securely hashed password.
- **Routes:** Defines API routes for authentication, registration, and profile management.
- **Middleware:** Provides middleware for handling authentication (auth) and guest access (guest).
- **Database Migration:** Includes migration for creating the users table with name, email, and password fields.

### Frontend (Vue.js):

- **Components:** Includes components for login (Login.vue), registration (Register.vue), user profile (User.vue), and error page (Error.vue).
- **Routing:** Configured with Vue Router (router/index.js) to navigate between different views.
- **API Integration:** Uses Axios for making HTTP requests to Laravel API endpoints for login, registration, and profile management.
- **Form Handling:** Implements form validation and error handling for user inputs.
- **Session Management:** Uses sessionStorage for storing user data after successful login.

## Functionality

### User Authentication:

- Allows users to register with a unique email address and a secure password (validated with minimum length).
- Provides login functionality with email and password validation.
- Implements session management to keep users logged in between page refreshes.

### Profile Management:

- Enables users to update their profile information (name, email, about me) securely.
- Implements draft saving locally to sessionStorage for user profiles to prevent data loss.

### Error Handling:

- Displays appropriate error messages for invalid login attempts, existing email during registration, and general API errors.
- Provides a 404 Not Found page for handling non-existent routes.

## Security Measures

### Password Security:

- Ensures passwords are securely hashed using Laravel's `Hash::make()` function before storing in the database.
- Validates password strength with a minimum length requirement (3 characters)(Security Measures reduce due to making registration easier).

## Installation and Setup

1. Clone the repository.
2. Install dependencies:

composer install

npm install

3. Configure environment variables in `.env` file for database connection and other settings.
4. Run migrations:

php artisan migrate

5. Compile frontend assets:

npm run dev

6. Serve the application:

php artisan serve


## Notes

- This project demonstrates a basic implementation of user authentication and profile management.
- Additional features and security enhancements can be implemented based on specific requirements and best practices.

