<?php

declare(strict_types=1);

use Core\User;
use Http\Models\NotesModel;

$heading = 'My Notes';
$currentUserId = User::getUserID();
$id = $_GET['id'];

$db = new NotesModel;

$note = $db->getNote($id);

if ($note) {
    authorize($note['user_id'] === $currentUserId, 403);

    view('notes/show.view.php', [
        'heading' => $heading,
        'note' => $note
    ]);
}



