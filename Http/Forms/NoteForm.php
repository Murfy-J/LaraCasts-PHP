<?php

namespace Http\Forms;

use Core\Validator;

class NoteForm extends BaseForm

{
    public function validateAttributes(): void
    {
        if (!Validator::string($this->attributes['body'], 100)) {
            $this->error('body', "The body must have at least one character");
        }

    }
}