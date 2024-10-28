<?php

use Core\App;
use Core\Database;
use Core\User;
use Http\Models\NotesModel;

$_SESSION['guestShop'] = [
    'I AM' => 'Donkey'
];

$currentUserId = User::getUserID();

$notes = (new NotesModel)->allNotes($currentUserId);

$shortText = array_map(function ($note) {
    return [
        'id' => $note['id'],                // Ensure 'id' exists
        'body' => substr($note['body'], 0, 70) // Ensure 'body' exists
    ];
}, $notes);

view('notes/index.view.php', [
    'heading' => 'MyNotes',
    'notes' => $shortText
]);
