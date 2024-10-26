<?php

use Core\App;
use Core\Database;
use Core\User;
use Core\Validator;
use Http\Forms\NoteForm;

$db = App::resolve(Database::class);

$currentUserId = User::getUserID();


NoteForm::validate([
    'body' => $_POST['body']
]);

$body = htmlspecialchars($_POST['body']);

$note = $db->query('INSERT INTO notes (`body`, `user_id`) VALUES (:body, :currentUserId)', [
    'body' => $body,
    'currentUserId' => $currentUserId
]);

redirect('/notes
    ');

