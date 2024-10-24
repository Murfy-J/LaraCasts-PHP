<?php

use Core\App;
use Core\Database;
use Core\User;
use Core\Validator;

$db = App::resolve(Database::class);


$errors = array();

$currentUserId = User::getUserID();

dd($_SESSION);

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'][] = 'Body of 1000 characters or less is required';
}


if ($errors) {
    view('notes/create.view.php', [
        'heading' => 'MyNotes',
        'errors' => $errors
    ]);
}

$body = htmlspecialchars($_POST['body']);

$note = $db->query('INSERT INTO notes (`body`, `user_id`) VALUES (:body, :currentUserId)', [
    'body' => $body,
    'currentUserId' => $currentUserId
]);

header('Location: /notes
    ');

