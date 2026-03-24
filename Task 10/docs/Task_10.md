# Task 10 README file

## (1) Resourceful Naming Conventions
- Using naming conventions with the 'notes' pages and put all of the notes dedicated files in its own directories:
    - controllers
        - notes
            - show.php
            - create.php
            - index.php 
    - views
        - notes
            - show.view.php
            - create.view.php
            - index.view.php

---

## (2) PHP Autoloading and Extractions
- If the user tries to reach one of the project files in his browser, he will access if easily due to a big security concern that we haven't noticed earlier and should be handled.
- The solution is to create a directory named `public` inside the project folder and move `index.php` to it and reinitialize the server again within public folder using:
  ```
  php -S localhost:3000 -t public
  ```
- Now the public folder will be the parent folder to the server.
- You will face several errors due to `require` in the index folder and you can fix this by adding:
    - a variable named `BASE_PATH`
    - a helper function in `functions.php`

---

## (3) Namespaces
- Namespaces in PHP are used to organize code and avoid name conflicts between classes, functions, and constants.
- Benefits:
    - Prevent class/function name conflicts
    - Improve organization
    - Improve readability and scalability
- Example:
  ```php
  namespace Core;
  ```

---

## (4) Handle Multiple Request Methods
- Example delete form:
  ```html
  <form class="mt-6" method="post">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button class="text-sm text-red-500">Delete</button>
  </form>
  ```
- Why POST?
    - GET is unsafe for destructive actions
    - POST is used for create/update/delete

---

## (5) Build a Better Router
- Problems with old router:
    - Simple array or switch logic
    - Mixed responsibilities
    - Hard to scale
- Improvements:
    - One Request → One Controller
    - Router decides **which** controller runs, not how

---

## (6) One Request, One Controller
- New structure:
  ```
  controllers/
    └── notes/
        ├── store.php
        └── destroy.php
  ```
- `store.php`: handles saving notes
- `destroy.php`: handles deleting notes
- Updated `create.php`:
  ```php
  <?php
  view("notes/create.view.php", [
      'heading' => 'Create note',
      'errors' => []
  ]);
  ```

---

## (7) First Service Container
- Problem: too many manual object creations
- Solution: Service Container
- Functions:
    - `bind($key, $resolver)`
    - `resolve($key)`
- App wrapper:
  ```php
  App::resolve('Core\Database');
  ```

---

## (8) Implementation of PATCH Requests
- Add route:
  ```php
  $router->get('/note/edit', 'controllers/notes/edit.php');
  ```
- HTML workaround:
  ```html
  <input type="hidden" name="_method" value="PATCH">
  ```
- Use SQL UPDATE safely
- Authorization:
  ```php
  authorize($note['transaction_id'] === $currentTransactionId);
  ```

---

## (9) PHP Sessions
- Start session:
  ```php
  session_start();
  ```
- Use:
  ```php
  $_SESSION
  ```
- Stores user data across pages

---

## (10) Register a New User
- Check if user exists:
  ```php
  $user = $db->query("SELECT * FROM users WHERE email = :email", [
        'email' => $email
    ])->find();
  ```
- Insert user & start session:
  ```php
  $_SESSION['logged_in'] = true;
  $_SESSION['user'] = [
      'email' => $email,
  ];
  ```

---

## (11) Introduction to Middleware
- Middleware = logic before controller
- Example:
  ```php
  public const MAP = [
      'guest' => Guest::class,
      'auth' => Auth::class,
  ];
  ```

---

## (12) Manage Passwords
- Never store plain passwords
- Use:
  ```php
  password_hash($password, PASSWORD_DEFAULT);
  ```

---

## (13) Log In and Log Out
- Login:
  ```php
  if ($user) {
      if (password_verify($password, $user['password'])) {
          login([
              'email' => $email,
          ]);
          header('Location: /');
          exit();
      }
  }
  ```
- Logout:
  ```php
  function logout() {
      $_SESSION = [];
      session_destroy();

      $params = session_get_cookie_params();
      setcookie('PHPSESSID', '', time() - 3600);
  }
  ```
