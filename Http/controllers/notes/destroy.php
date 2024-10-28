<?php

declare(strict_types=1);

use Core\User;
use Http\Models\NotesModel;

$heading = 'My Notes';

$currentUserId = User::getUserID();

$noteId = $_POST["noteID"];

$db = new NotesModel;

$note = $db->getNote($noteId);

authorize($currentUserId === $note['user_id']);

$db->deleteNote($noteId);

redirect('/notes');
die();
