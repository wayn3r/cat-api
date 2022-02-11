<?php

namespace CatApp\Cat\Application\Remove;

class RemoveCatCommand {
    private int $id;

    public function __construct(int $id) {
        $this->id = $id;
    }
    
    public function id(): int {
        return $this->id;
    }
}