<?php

use Core\User;
use Http\Forms\NoteForm;
use Http\Models\NotesModel;

$id = $_POST['noteId'];
$body = htmlspecialchars($_POST['body']);

$currentUserId = User::getUserID();

NoteForm::validate(['body' => $body]);

$db = new NotesModel;

$note = $db->getNote($id);

authorize($currentUserId === $note['user_id']);

$db->updateNote($note['id'], $body);

redirect(' /notes
    ');

