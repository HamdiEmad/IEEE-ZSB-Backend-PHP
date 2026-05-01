# Task 19 Research

## (1) MVC Pattern

-   The Model is the only part of the application that should be allowed
    to talk directly to the database.
-   The Model centralizes data logic and makes it easier to maintain the
    application.

## (2) Database Passwords

-   It is essential to store sensitive information in a separate
    configuration file for several reasons:
    1.  **Security:** Credentials can be easily leaked if they are
        hardcoded, especially in public repositories.
    2.  **Separation of Concerns:** Each part of the application has a
        clear responsibility (e.g., config file handles environment
        settings).
    3.  **Flexibility:** Easier to switch between different environments
        (development, testing, production).

## (3) PDO in PHP

-   PDO (PHP Data Objects) is a database abstraction layer that provides
    an object-oriented interface for interacting with databases.
-   `mysqli` supports only MySQL, while PDO supports multiple database
    systems.
-   PDO includes built-in support for prepared statements, which help
    prevent SQL injection.

## (4) Prepared Statements

-   Prepared statements protect against SQL Injection by separating SQL
    logic from user input.
-   User input is bound to placeholders and sent separately, ensuring it
    is treated strictly as data.

## (5) Query a Database

### Fetching a Single Row

1.  Getting full information about an employee using their ID.
2.  Viewing bank account details based on login credentials.
3.  Retrieving a student's full grades using their student ID.

### Fetching Multiple Rows

1.  Getting all customers from a specific country.
2.  Retrieving all students within a specific department in college.
