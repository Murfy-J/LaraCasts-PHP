<?php

use Core\User;
use Http\Forms\NoteForm;
use Http\Models\NotesModel;

$currentUserId = User::getUserID();

NoteForm::validate([
    'body' => $_POST['body']
]);

$body = htmlspecialchars($_POST['body']);

(new NotesModel)->createNote([
    'currentUserId' => $currentUserId,
    'body' => $body
]);

redirect('/notes
    ');

