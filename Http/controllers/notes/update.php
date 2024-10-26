<?php

use Core\App;
use Core\Database;
use Core\User;
use Http\Forms\NoteForm;

$id = $_POST['noteId'];
$body = $_POST['body'];

$currentUserId = User::getUserID();

NoteForm::validate([
    'body' => $body
]);

$db = App::resolve(Database::class);

$note = $db->query('Select * from notes where id = :id', ['id' => $id])->findOrFail();

authorize($currentUserId === $note['user_id']);

$db->query('update notes set body = :body where id = :id', ['id' => $id, 'body' => $_POST['body']]);

//redierct to notes

redirect(' /notes
    ');

