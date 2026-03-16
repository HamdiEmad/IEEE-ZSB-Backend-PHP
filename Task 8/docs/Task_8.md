# Task 8 Readme file

## Table of Contents

1. [Your First PHP Tag](#1-your-first-php-tag)
2. [Variables](#2-variables)
3. [Conditionals and Booleans](#3-conditionals-and-booleans)
4. [Arrays](#4-arrays)
5. [Associative Arrays](#5-associative-arrays)
6. [Functions and Filters](#6-functions-and-filters)
7. [Lambda Functions](#7-lambda-functions)
8. [Separating Logic From the Template](#8-separating-logic-from-the-template)
9. [Page Links](#9-page-links)
10. [PHP Partials](#10-php-partials)
11. [Superglobals and Current Page Styling](#11-superglobals-and-current-page-styling)
12. [Building a PHP Router](#12-building-a-php-router)
13. [PDO — PHP Data Objects](#13-pdo--php-data-objects)
14. [Extracting a Database Class](#14-extracting-a-database-class)
15. [SQL Injection and Prepared Statements](#15-sql-injection-and-prepared-statements)

---

## 1. Your First PHP Tag

PHP is embedded inside HTML using special tags.

```php
<?php
  echo "Hello, World!";
?>
```

### Key Rules

- PHP code lives between `<?php` and `?>`.
- Statements end with a **semicolon** `;`.
- `echo` is used to output content to the browser.
- PHP files use the `.php` extension.

### Short Echo Tag

```php
<?= "Hello, World!" ?>
```

This is shorthand for `<?php echo ... ?>` and is commonly used inside HTML templates.

---

## 2. Variables

Variables in PHP store data that your program works with.

```php
$name = "Hamdi";
$age = 21;
$price = 9.99;
$isActive = true;
```

### Rules

- Variables always start with `$`.
- Variable names are **case-sensitive** (`$name` ≠ `$Name`).
- No need to declare a type — PHP is dynamically typed.

### Data Types

| Type | Example |
|------|---------|
| String | `"Hello"` |
| Integer | `42` |
| Float | `3.14` |
| Boolean | `true` / `false` |
| Null | `null` |

## 3. Conditionals and Booleans

Conditionals allow your program to make decisions.

```php
$age = 20;

if ($age >= 18) {
    echo "You are an adult.";
} else if ($age >= 13) {
    echo "You are a teenager.";
} else {
    echo "You are a child.";
}
```

### Comparison Operators

| Operator | Meaning |
|----------|---------|
| `==` | Equal (loose) |
| `===` | Identical (strict — type + value) |
| `!=` | Not equal |
| `!==` | Not identical |
| `>` `<` `>=` `<=` | Greater/Less than |

> ✅ Prefer `===` over `==` to avoid unexpected type coercion bugs.

### Booleans

```php
$isLoggedIn = true;
$hasPermission = false;

if ($isLoggedIn && $hasPermission) {
    echo "Access granted.";
}
```

---

## 4. Arrays

Arrays store multiple values in a single variable.

```php
$fruits = ["apple", "banana", "cherry"];

echo $fruits[0]; // apple
echo count($fruits); // 3
```

### Array Filtering

```php
$numbers = [1, 2, 3, 4, 5, 6];

$evens = array_filter($numbers, function($n) {
    return $n % 2 === 0;
});
// Result: [2, 4, 6]
```

---

## 5. Associative Arrays

Associative arrays use **named keys** instead of numeric indexes — think of them as key-value pairs.

```php
$person = [
    "name"  => "Hamdi",
    "age"   => 21,
    "email" => "hamdi@example.com"
];

echo $person["name"]; // Hamdi
```

### Looping Over Associative Arrays

```php
foreach ($person as $key => $value) {
    echo "$key: $value <br>";
}
```
---

## 6. Functions and Filters

Functions let you group reusable blocks of logic.

```php
function greet($name) {
    return "Hello, $name!";
}

echo greet("Hamdi"); // Hello, Hamdi!
```

### Default Parameters

```php
function greet($name = "Guest") {
    return "Hello, $name!";
}

echo greet();        // Hello, Guest!
echo greet("Hamdi"); // Hello, Hamdi!
```

### Filtering Arrays with Functions

```php
function isAdult($age) {
    return $age >= 18;
}

$ages = [15, 22, 17, 30];
$adults = array_filter($ages, 'isAdult');
// Result: [22, 30]
```

---

## 7. Lambda Functions

Lambda functions (also called **anonymous functions** or **closures**) are functions without a name, often passed as arguments.

```php
$double = function($n) {
    return $n * 2;
};

echo $double(5); // 10
```

### Using Lambdas with Array Functions

```php
$numbers = [1, 2, 3, 4, 5];

// array_map — transform each element
$doubled = array_map(fn($n) => $n * 2, $numbers);
// Result: [2, 4, 6, 8, 10]

// array_filter — keep elements that pass a test
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);
// Result: [2, 4]
```

## 8. Separating Logic From the Template

One of the most important principles in PHP development: **keep your logic out of your HTML**.

### Bad Practice (mixing everything)

```php
<!-- index.php -->
<?php
$items = ["Apple", "Banana", "Cherry"];
?>
<ul>
  <?php foreach($items as $item): ?>
    <li><?= $item ?></li>
  <?php endforeach; ?>
</ul>
```

### Good Practice (separate files)

```php
// logic.php — handles data preparation
$items = ["Apple", "Banana", "Cherry"];

// index.php — only outputs HTML
require 'logic.php';
?>
<ul>
  <?php foreach($items as $item): ?>
    <li><?= $item ?></li>
  <?php endforeach; ?>
</ul>
```

### Why This Matters

- Easier to read and maintain
- Makes debugging faster
- Sets you up for MVC-style architecture (used in Laravel and other frameworks)

---

## 9. Page Links

In PHP, you link between pages just like in HTML — but you can make links dynamic.

```php
<a href="/about.php">About</a>
<a href="/contact.php">Contact</a>
```

### Dynamic Links

```php
$pages = ["home", "about", "contact"];

foreach ($pages as $page) {
    echo "<a href='/$page.php'>$page</a>";
}
```

---

## 10. PHP Partials

Partials are **reusable PHP snippets** (like a header or footer) that you include in multiple pages.

### Creating a Partial

```php
<!-- partials/nav.php -->
<nav>
  <a href="/">Home</a>
  <a href="/about.php">About</a>
</nav>
```

### Including a Partial

```php
<!-- index.php -->
<?php require 'partials/nav.php'; ?>
<h1>Welcome to the homepage</h1>
<?php require 'partials/footer.php'; ?>
```

## 11. Superglobals and Current Page Styling

### What are Superglobals?

Superglobals are **built-in PHP variables** that are always accessible, regardless of scope. You don't need to pass them into functions — they're available everywhere.

| Superglobal | Purpose |
|-------------|---------|
| `$_GET` | Data from URL query strings |
| `$_POST` | Data from form submissions |
| `$_REQUEST` | Combines `$_GET` and `$_POST` |
| `$_SERVER` | Server and request info (headers, paths, etc.) |
| `$_SESSION` | Data stored across multiple pages for a user |
| `$_COOKIE` | Data stored in the browser cookies |
| `$_FILES` | Uploaded file data |
| `$_ENV` | Environment variables |
| `$GLOBALS` | All global variables |

### Practical Example: `$_SERVER`

```php
// Get the current URL path
$currentPath = $_SERVER['REQUEST_URI'];
// e.g. "/about" or "/contact"
```

### Using Superglobals for Active Nav Links

A common pattern is to highlight the current page in the navigation:

```php
<!-- partials/nav.php -->
<?php $currentPath = $_SERVER['REQUEST_URI']; ?>

<nav>
  <a href="/" class="<?= $currentPath === '/' ? 'active' : '' ?>">Home</a>
  <a href="/about" class="<?= $currentPath === '/about' ? 'active' : '' ?>">About</a>
  <a href="/contact" class="<?= $currentPath === '/contact' ? 'active' : '' ?>">Contact</a>
</nav>
```

## 12. Building a PHP Router

A router maps incoming URLs to specific PHP files/controllers — it's the backbone of any web application.

### Simple Router

```php
// index.php (entry point)

$uri = $_SERVER['REQUEST_URI'];

$routes = [
    '/'        => 'views/home.php',
    '/about'   => 'views/about.php',
    '/contact' => 'views/contact.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require 'views/404.php';
}
```

## 13. PDO — PHP Data Objects

### What is PDO?

**PDO (PHP Data Objects)** is a database abstraction layer built into PHP. It provides a consistent, object-oriented interface to connect to and interact with databases.

### Why Use PDO?

- Works with multiple databases (MySQL, PostgreSQL, SQLite, etc.)
- Supports **prepared statements** (protection against SQL injection)
- Clean, object-oriented API
- Handles errors through exceptions

### Connecting with PDO

```php
$dsn  = "mysql:host=localhost;dbname=my_app;charset=utf8mb4";
$user = "root";
$pass = "root";

### Fetching Data

```php
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(); // Returns array of rows

foreach ($users as $user) {
    echo $user['name'] . "<br>";
}
```

### PDO Fetch Modes

| Mode | Description |
|------|-------------|
| `PDO::FETCH_ASSOC` | Returns rows as associative arrays |
| `PDO::FETCH_OBJ` | Returns rows as objects |
| `PDO::FETCH_NUM` | Returns rows as numeric arrays |

---

## 14. Extracting a Database Class

As your application grows, it's cleaner to wrap your PDO connection in a dedicated class.

```php
// Database.php
class Database
{
    protected PDO $connection;

    public function __construct(array $config)
    {
        $dsn = $config['connection'] . ';dbname=' . $config['database'];

        $this->connection = new PDO(
            $dsn,
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }

    public function query(string $query, array $params = []): PDOStatement
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
```

### Using the Class

```php
$db = new Database([
    'connection' => 'mysql:host=localhost',
    'database'   => 'my_app',
    'username'   => 'root',
    'password'   => 'secret',
]);

$users = $db->query("SELECT * FROM users")->fetchAll();
```

This pattern makes your code reusable and easy to swap database drivers in the future.

---

## 15. SQL Injection and Prepared Statements

### What is SQL Injection?

SQL Injection is one of the most dangerous and common web security vulnerabilities. It happens when **user input is inserted directly into an SQL query**, allowing an attacker to manipulate the query.

### Vulnerable Example

```php
$username = $_GET['username']; // attacker input: ' OR '1'='1

$query = "SELECT * FROM users WHERE username = '$username'";
// Resulting query:
// SELECT * FROM users WHERE username = '' OR '1'='1'
// This returns ALL users — a full database breach!
```

An attacker could also do:

```
' DROP TABLE users; --
```

Which would **delete your entire users table**.

### The Fix: Prepared Statements

Prepared statements separate the **SQL structure** from the **user data**. The database knows what is code and what is data — so no injection is possible.

```php
// Using PDO with a prepared statement
$username = $_GET['username']; // even if malicious, it's safe now

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$stmt->execute([':username' => $username]);
$user = $stmt->fetch();
```

### How It Works Internally

1. PHP sends the query **template** to the database: `SELECT * FROM users WHERE username = ?`
2. The database **compiles** the query structure.
3. PHP then sends the **values** separately.
4. The database treats the values as **pure data**, never as SQL code.

### Named vs Positional Placeholders

```php
// Named placeholders (recommended — more readable)
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->execute([':name' => $name, ':email' => $email]);

// Positional placeholders
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->execute([$name, $email]);
```