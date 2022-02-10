<?php

namespace CatApp\Shared\Domain;

abstract class IntValueObject {
    private int $value;

    public function __construct(int $value) {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}