# Task 11 README

## (1) Extract a Form Validation Object

- The `controllers` directory is moved to a new directory called `Http`.
- For more readability and modularity, a new class called `LoginForm` is created which contains the validation logic of the login page.
- The class has 2 methods:
  1. **`validate($email, $password)`** — A boolean function for validating user credentials. Returns `true` if both email & password are valid (i.e., the `$errors` array is empty).
  2. **`errors()`** — A getter function to retrieve whether there is invalid user information.

---

## (2) Extract an Authenticator Class

- A new class named `Authenticator` is created to handle user login, logout, and related functionalities:
  1. **`attempt($email, $password)`** — Tries to log in a user after checking their existence in the database and verifying the password. If all checks pass, the user is redirected to the home page.
  2. **`login($user)`** — Previously a helper function in `functions.php`, moved to the `Authenticator` class.
  3. **`logout()`** — Also moved to the `Authenticator` class alongside `login()`.
- An **`error($field, $message)`** function is added to `LoginForm` to append errors to the errors array.

---

## (3) The PRG Pattern (and Session Flashing)

- **PRG** (Post/Redirect/Get) is a common approach for handling form submissions and validations.
- If validation fails, instead of returning a view, a redirect is performed — sending the user to a new page where a GET request is made.
- Sessions are used as temporary storage and must be **flashed** to preserve data flow between requests (POST & GET).
- A `Session` class is created to consolidate all session functionality:
  1. **`has($key)`** — Checks whether a session key exists.
  2. **`put($key, $value)`** — Stores data in the session.
  3. **`get($key, $default = null)`** — Retrieves data from the session.
  4. **`flash($key, $value)`** — Stores temporary (flash) data.
  5. **`unflash()`** — Deletes all flash data.
  6. **`flush()`** — Clears all session data.
  7. **`destroy()`** — Completely destroys the session.

---

## (4) Flash Old Form Data to the Session

- When a form submission fails, the user's previously entered data can be automatically refilled — known as **old input**.
- A new helper function **`old($key, $default = null)`** is added to the functions class to retrieve previously submitted form input from the session.

---

## (5) Automatically Redirect Back Upon Failed Validations

- Controller logic is updated so that when a form submission fails validation, the script immediately redirects back to the login page.
- A `ValidationException` class is created to represent validation failure as an exception.
  - It allows automatic redirect and flashing via a central handler.
- The `Router` class is updated with a function to return the previous URL for redirection purposes.

---

## (6) Composer and Free Autoloading

- **Composer** is a PHP dependency manager — a tool that helps install, manage, and update external libraries your project depends on.
- Key usages:
  1. Install required libraries.
  2. Update them easily.
  3. Handle autoloading.
  4. Track everything in a `composer.json` file.

---

## (7) Install Two Composer Packages: Collections and PestPHP

- **Collections** — A package that lets you work with arrays in a cleaner, more expressive, and powerful way using object-oriented and functional programming concepts.
- **Pest PHP** — A modern testing framework for PHP designed to make writing tests simpler, more readable, and more enjoyable compared to traditional PHPUnit-style tests.