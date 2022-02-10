<?php

namespace CatApp\Breed\Application\Remove;

class RemoveBreedCommand {
    private int $id;

    public function __construct(int $id) {
        $this->id = $id;
    }
    
    public function id(): int {
        return $this->id;
    }
}