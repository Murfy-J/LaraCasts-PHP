<?php
declare(strict_types=1);

namespace Http\Forms;

use Core\ValidationException;

abstract class BaseForm
{
    protected array $errors = [];
    protected array $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->validateAttributes();
    }

    // All child classes will need to have this functions defined
    abstract protected function validateAttributes(): void;

    /**
     * @throws ValidationException
     */
    public static function validate(array $attributes): static
    {
        $instance = new static($attributes);
        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(): void
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error(string $field, string $message): self
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
