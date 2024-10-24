<?php


use Core\App;
use Core\Database;
use Core\User;

$_SESSION['guestShop'] = [
    'I AM' => 'Donkey'
];

$db = App::resolve(Database::class);

$currentUserId = User::getUserID();

$notes = $db->query('SELECT * FROM notes where user_id = :id',
    [
        ':id' => $currentUserId
    ])->get();


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
