<?php

namespace Http\Models;

use Core\App;
use Core\Database;

class NotesModel
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function allNotes($currentUserId)
    {
        return $this->db->query('SELECT * FROM notes where user_id = :id',
            [
                ':id' => $currentUserId
            ])->get();
    }

    public function getNote($noteId)
    {
        return $this->db->query('SELECT * FROM notes WHERE id = :id', [
            ':id' => $noteId,
        ])->findOrFail();
    }

    public function createNote($attributes)
    {
        $this->db->query('INSERT INTO notes (`body`, `user_id`) VALUES (:body, :currentUserId)', [
            'body' => $attributes['body'],
            'currentUserId' => $attributes['currentUserId']
        ]);
    }

    public function updateNote($noteId, $body)
    {
        $this->db->query('UPDATE notes SET body = :body WHERE id = :id', [
            ':body' => $body,
            ':id' => $noteId,
        ]);
    }

    public function deleteNote($noteId)
    {
        $this->db->query('DELETE FROM notes WHERE id = :id', [
            ':id' => $noteId,
        ]);
    }
}