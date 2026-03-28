<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentTransactionId = 134;

$note = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE transaction_id = :id', [
    'id' => $_GET['transaction_id']])->findOrFail();

authorize($note['transaction_id'] === $currentTransactionId);

view("notes/edit.view.php", [
    'heading' => 'Edit note',
    'errors' => []
]);