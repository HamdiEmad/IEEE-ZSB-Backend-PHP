<?php

$config = require 'config.php';
$db = new Database($config);

$heading = "Create note";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => $currentUser->id,
    ]);
}

require 'views/note-create.view.php';
