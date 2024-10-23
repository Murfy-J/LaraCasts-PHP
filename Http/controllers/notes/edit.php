<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUser = 5;

//dd('We are in the edit controller');

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    ':id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$heading = "Edit New Note";

view('notes/edit.view.php', [
    'heading' => $heading,
    'note' => $note,
    'errors' => []
]);
