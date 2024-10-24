<?php

declare(strict_types=1);

use Core\App;
use Core\Database;
use Core\User;

$db = App::resolve(Database::class);

$heading = 'My Notes';
$currentUserId = User::getUserID();


$id = $_GET['id'];

$note = $db->query('SELECT * FROM notes WHERE id = :id and user_id = :currentUserId', [
    ':id' => $id,
    ':currentUserId' => $currentUserId
])->findOrFail();


authorize($note['user_id'] === $currentUserId, 403);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);
