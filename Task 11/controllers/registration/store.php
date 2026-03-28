<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please enter a password of at least 7 characters';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email
])->find();

if ($user) {
    header('location: /' );
    exit();
} else {
    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    login($user);

    header('location: /');
    exit();
}