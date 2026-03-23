<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config);

$notes = $db->query('SELECT * FROM ramadan_mystrey.sobia_king_sales WHERE customer_phone like "011-62%";')->get();

view("notes/index.view.php", [
   'heading' => 'My Notes',
    'notes' => $notes,
]);
