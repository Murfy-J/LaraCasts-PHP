<?php

declare(strict_types=1);

use Core\App;
use Core\Database;
use Core\User;

$db = App::resolve(Database::class);

$heading = 'My Notes';

$currentUserId = User::getUserID();

$postID = $_POST["noteID"];

$note = $db->query("DELETE from notes where id = :id AND user_id = :currentUserId", [
    "id" => $postID,
    "currentUserId" => $currentUserId
]);

redirect('/notes');
die();
