<?php 

namespace CatApp\Cat\Application\Find;

class FindCatQuery {

    private string $name;

    public function __construct(?string $name = '') {
        $this->name = $name ?? '';
    }

    public function name(): string {
        return $this->name;
    }
}