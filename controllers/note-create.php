<?php

$config = require 'config.php';
$db = new Database($config);

$heading = "Create note";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors =[];
    if (strlen($_POST['body']) === 0) {
        $errors['body'] = "A body is required";
    }
    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = "The body cannot exceed 1000 characters";
    }
    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $currentUser->id,
        ]);
    }
}

require 'views/note-create.view.php';
