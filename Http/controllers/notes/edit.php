<?php

declare(strict_types=1);

use Core\User;
use Http\Models\NotesModel;

$currentUser = User::getUserID();
$id = $_GET['id'];

$db = new NotesModel;

$note = $db->getNote($id);

if ($note) {
    authorize($note['user_id'] === $currentUser);

    $heading = "Edit New Note";

    view('notes/edit.view.php', [
        'heading' => $heading,
        'note' => $note,
        'errors' => []
    ]);
}

redirect('/notes');




