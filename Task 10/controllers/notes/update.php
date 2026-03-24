<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentTransactionId = 134;

$note = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE transaction_id = :id', [
    'id' => $_POST['transaction_id']])->findOrFail();

authorize($note['transaction_id'] === $currentTransactionId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1000 characters is required";
}

if (count($errors)) {
    return view('notes/edit.view', [
        'heading' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('update ramadan_mystrey.sobia_king_sales set body = :body where transaction_id = :id', [
    'id' => $_POST['transaction_id'],
    'body' => $_POST['body']
]);

header('Location: /notes');
die();
