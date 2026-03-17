<?php

$config = require 'config.php';
$db = new Database($config);

$heading = "Note";
$currentTransactionId = 134;

$note = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE transaction_id = :id', ['id' => $_GET['transaction_id']]);

if ($note) {
    abort();
}

if ($note['transaction_id'] != $currentTransactionId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";