<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

//dd('WE hit the destroy the notes');


$heading = 'My Notes';

$currentUserId = 5;

$postID = $_POST["noteID"];

$note = $db->query("DELETE from notes where id = :id AND user_id = :currentUserId", [
    "id" => $postID,
    "currentUserId" => $currentUserId
]);

header('location: /notes');
die();
