<?php

use Core\App;
use Core\Database;
use Core\User;
use Core\Validator;

$id = $_POST['noteId'];

$currentUserId = User::getUserID();

$db = App::resolve(Database::class);

// Find the corresponding note

$note = $db->query('Select * from notes where id = :id', ['id' => $id])->findOrFail();

// authorize  that the current sure can edit the data

authorize($currentUserId === $note['user_id']);

//validate the form
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'][] = 'Body of 1000 characters or less is required';
}

if ($errors) {

    view('notes/edit.view.php', [
        'heading' => 'Update a note',
        'errors' => $errors,
        'note' => $note,
    ]);

    die();
}

//if there are no error then update the note in the database

$db->query('update notes set body = :body where id = :id', ['id' => $id, 'body' => $_POST['body']]);

//redierct to notes

header('Location: /notes
    ');

