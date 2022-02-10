<?php

namespace CatApp\Shared\Domain;

use JsonSerializable;

abstract class AggregateRoot implements JsonSerializable{

    abstract public function toPrimitive(): array;

    public function jsonSerialize() {
        return $this->toPrimitive();
    }
}