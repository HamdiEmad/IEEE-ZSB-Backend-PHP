<?php

require 'Task 9/Validator.php';

$config = require 'Task 9/config.php';
$db = new Database($config);

$heading = "Create note";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors =[];
    if (! Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "A body of no more than 1000 characters is required";
    }
    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $currentUser->id,
        ]);
    }
}

require 'views/note-create.view.php';