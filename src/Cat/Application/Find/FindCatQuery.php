<?php 

namespace CatApp\Cat\Application\Find;

class FindCatQuery {

    public const EMPTY_ID = 0;

    private string $id;

    public function __construct(int $id) {
        $this->id = $id;
    }

    public function id(): int {
        return $this->id;
    }
}