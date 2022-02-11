<?php

namespace CatApp\Shared\Domain;

abstract class FloatValueObject {
    private float $value;

    public function __construct(float $value) {
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}