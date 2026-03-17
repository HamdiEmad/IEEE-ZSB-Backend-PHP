# Task 9 README

## (1) Database Tables and Indexes
- Knowing the importance of tables and relationships between different entities in the database.
- Learning how to create a table (Entity) and add some attributes (Properties) to that table.
- Explaining the importance of a unique index in your database to prohibit repeating values in records.
- Linking between tables using keys like foreign key.

---

## (2) Dealing with Database in PHP
- Adding Notes page to the router.
- Updating `router.php` & `index.php`.
- Updating the notes page to import data from database to the view:

```php
<?php require ('partials/head.php') ?>
<?php require ('partials/nav.php') ?>
<?php require ('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <li> <?= $note['customer_phone']?> </li>
        <?php endforeach; ?>
    </div>
</main>
<?php require ('partials/footer.php') ?>
```

---

## (3) Introduction to Authorization
- The Authorization process means determining what an authenticated user is allowed to do in your application.
- Fixing the issue of the user's specific notes to prevent him from accessing other users' notes:

```php
if ($note['transaction_id'] != 134) {
    abort(403);
}
```

- Using magic numbers to clarify your code:

```php
$currentTransactionId = 134;
```

---

## (4) Refactoring & Improving
- Editing the Database class and adding a method to fetch the statement inside the class without the need to fetch it in the `note.php` file:

```php
public function find() {
    return $this->statement->fetch();
}
```

- Updating the previous function and creating a new one to handle not found pages:

```php
public function findOrFail() {
    $result = $this->find();
    if (! $result) {
        abort();
    }
    return $result;
}
```

- Adding a function in `functions.php` file to handle any unauthorized access:

```php
public function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}
```

---

## (5) Creating a Note
- Editing the routes to add a new route for creating a note:

```php
'/notes/create' => 'controllers/note-create.php'
```

- Adding the controller of creation and the view of the page.
- Importing a form layout from Tailwind UI components.

---

## (6) Handling Untrusted Inputs
- Using PHP special function called `htmlspecialchars()`:

```php
<a href="/note?id= <?=$note['transaction_id']?>" class="text-blue-500 hover:underline">
    <?= htmlspecialchars($note['customer_phone'])?>
</a>
```

---

## (7) Form Validations
- To prevent empty textarea, add a `required` attribute in the HTML form.
- Adding an `$errors` array in note-create controller:

```php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = "A body is required";
    }
}
```

- Checking maximum length:

```php
if (strlen($_POST['body']) > 1000) {
    $errors['body'] = "The body cannot exceed 1000 characters";
}
```

- If validation passes:

```php
if (empty($errors)) {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => $currentUser->id,
    ]);
}
```

---

## (8) Extract a Simple Validator Class
- Separating validation logic into a class:

```php
class Validator {
    public static function string($value, $min = 1, $max = INF) {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
```

- The `static` keyword allows using the function without creating an instance of the class.