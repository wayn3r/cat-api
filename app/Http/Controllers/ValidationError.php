<?php

namespace App\Http\Controllers;

use Exception;

class ValidationError extends Exception {
    private array $errors;
    public function __construct(array $errors) {
        parent::__construct('Validation Error', 422);
        $this->errors = $errors;
    }

    public function errors(): array {
        return $this->errors;
    }
}