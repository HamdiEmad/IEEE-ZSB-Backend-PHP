<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);
$currentTransactionId = 134;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $note = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE transaction_id = :id', [
        'id' => $_GET['transaction_id']])->findOrFail();

    authorize($note['transaction_id'] === $currentTransactionId);

    $db->query("DELETE FROM notes WHERE id = :id", [
        'id' => $_GET['id '],
    ]);
    header("Location:/notes");
    exit();
} else {

    $note = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE transaction_id = :id', [
        'id' => $_GET['transaction_id']])->findOrFail();

    authorize($note['transaction_id'] === $currentTransactionId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}

