<?php

namespace CatApp\Shared\Domain;

use DomainException;

class BreedInUse extends DomainException {
    public const ERROR_CODE = 1451;
    private BreedId $id;
    public function __construct(BreedId $id){
        $this->id = $id;
        parent::__construct();
        $this->message = $this->errorMessage();
    }
    public function errorMessage(): string {
        return sprintf('The breed %s is being used cannot be deleted', $this->id->value());
    }
}