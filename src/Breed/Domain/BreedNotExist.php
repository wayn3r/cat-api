<?php

namespace CatApp\Breed\Domain;

use DomainException;

class BreedNotExist extends DomainException {
    private BreedId $id;
    public function __construct(BreedId $id){
        $this->id = $id;
        parent::__construct();
    }
    protected function errorMessage(): string {
        return sprintf('The breed <%s> does not exist', $this->id->value());
    }
}