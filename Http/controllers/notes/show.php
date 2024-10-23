<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = 'My Notes';
$currentUserId = 5;


$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    // 'user' => '5',
    'id' => $id,
])->findOrFail();


authorize($note['user_id'] === $currentUserId, 403);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);
