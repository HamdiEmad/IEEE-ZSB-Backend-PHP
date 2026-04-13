# PHP Security

This task specifies many challenges that would face the programmer and how to deal with each one.

---

## (1) General Tips

- Object-Oriented Programming (OOP) or MVC architecture can't protect your application itself; it is used for organization, readability, maintainability, modularity and more.
- A framework does this work itself — it doesn't require you to do it manually. For example, Laravel provides an authentication system and layers of security that save a huge effort compared to doing it manually in native PHP.
- Updates are important as newer versions include fixes to multiple issues, bugs, or security holes found in previous ones.
- Maintaining your code using OOP — including functions, files, and layers — is helpful when updating a specific function or editing your code after a period of time.

---

## (2) Cross-Site Scripting and Filtering Inputs

- An attacker can write a script in a form field or in a GET request to hack into your database or perform any kind of unsafe action.
- Sanitize filters can be a solution, as they filter the input and remove anything that could be a threat or illegal.
- For example, to filter an input to reject tags: `FILTER_SANITIZE_STRING`.
- There are many sanitizing filters that process input and return only what you expect (numbers, strings, etc.).

---

## (3) Prevent SQL Injection

- SQL Injection (SQLi) is a type of security vulnerability that allows an attacker to interfere with the database queries an application makes.
- The programmer must imagine multiple scenarios of both regular user input and attacker input, and secure the website accordingly.
- A GET request mustn't be empty and shouldn't request data that doesn't exist in the database.

---

## (4) Prevent Remote File Injection

- Remote File Injection (RFI) in PHP is a serious security vulnerability where an attacker can make your application include and execute a file from a remote server.
- It can be prevented by creating an array of allowed pages and showing an error message if the requested page isn't in the array.
- It can be fully disabled by editing `php.ini` and setting `allow_url_include` to `OFF`.

---

## (5) Hashing Passwords the Right Way

- Sensitive data like passwords or credit card numbers can't be saved in the database as plaintext.
- Password hashing converts a password into a fixed, irreversible string (hash) so the actual password is never stored.
- A **salt** — a long, random string added to a password before hashing — makes common cracking methods such as Dictionary Attacks and lookup tables ineffective.
- `password_hash()` is a PHP 5.0+ function used for hashing passwords using different algorithms and options to increase complexity.
- `password_verify()` is used to check whether a given password matches a previously hashed one.

---

## (6) Disable Errors in Production Environment

- An error in a production environment means something went wrong in your live application, and it must be handled differently than in development.
- Attackers can extract sensitive details from errors, such as file paths, database structure, or internal logic.
- In **development**, show detailed errors for debugging. In **production**, hide errors from users and log them internally.

---

## (7) Disable Directory Listing Using .htaccess

- Directory listing (also called directory browsing) is when a web server shows the contents of a folder in the browser instead of loading a normal page.
- It can be disabled using an `.htaccess` file — a configuration file that Apache reads and executes.
- Add `Options -Indexes` inside `.htaccess` to prevent listing. You can also display a custom error message using:
  ```
  ErrorDocument <errorCode> "message"
  ```

---

## (8) Header Location Redirect

- In PHP, `header("Location: ...")` is used to redirect the user to another page.
- It is dangerous if the `header()` function is not followed by `die()` or `exit()`, as the script may continue executing after the redirect.

---

## (9) Why You Should Always Use HTTPS

- HTTPS stands for **HyperText Transfer Protocol Secure** — the secure version of HTTP used to safely transfer data between a browser and a website.
- In **HTTP**, data is sent in plain text. In **HTTPS**, data is encrypted.

---

## (10) Create Directories Firewall

- A firewall is a security system that controls incoming and outgoing network traffic — it acts like a security guard between your server and the internet.
- In cPanel, for example, using **Directory Privacy**, you can add a username and password and manage an authorized users list.

---

## (11) Protect Directory with IP

- To protect a directory by IP address in Apache (using `.htaccess`), you restrict access so only specific IPs can open that folder.
- Syntax:
  ```apache
  Order Deny,Allow
  Deny from all
  Allow from <IP address>
  ```

---

## (12) Prevent Execution of Specific Files

- To prevent execution of specific files in Apache/PHP, use server rules to stop certain file types from being executed even if they are uploaded or accessed.
- Common approaches:

  **1. Prevent execution using `.htaccess`**
  - Block execution of PHP files in a folder
  - Block specific file types
  - Alternative: stop execution but allow download

  **2. Prevent execution in upload folders (Best Practice)**

---

## (13) Securing Uploads

- Securing file uploads in PHP is one of the most critical security topics, as upload vulnerabilities often lead to full server takeover (RCE).
- Best practices:
  - **Never** trust the file extension
  - Allow only specific file types (whitelist)
  - Validate MIME type *(important)*
  - Rename uploaded files *(very important)*
  - Store uploads outside the web root *(best practice)*
  - Disable script execution in the uploads folder
  - Limit file size
  - Use a secure upload flow

---

## (14) Fix Log Errors

- In PHP, logging errors means saving errors to a file (or system log) instead of displaying them to users — essential in production for both security and debugging.

---

## (15) Validation on Back-End

- Back-end validation means checking and verifying user input on the server (PHP, Node.js, etc.) before processing or storing it in the database.
- Front-end validation can be bypassed; back-end validation cannot.
- Back-end validation protects against:
  - SQL Injection attempts
  - Invalid or malicious data
  - Broken business logic
  - Direct API attacks (e.g., Postman, bots)

---

## (16) Prevent Session Fixation

- Session fixation is an attack where a hacker forces or tricks a user into using a session ID the attacker already knows, then hijacks the session after login.
- The solution is to use `session_regenerate_id()`, which updates the session ID with a new one without changing any other session data.