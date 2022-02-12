<?php

namespace CatApp\Shared\Domain;

use DomainException;

class BreedNotExist extends DomainException {
    public const ERROR_CODE = 1452;
    private BreedId $id;
    public function __construct(BreedId $id){
        $this->id = $id;
        parent::__construct();
        $this->message = $this->errorMessage();
    }
    public function errorMessage(): string {
        return sprintf('The breed %s does not exist', $this->id->value());
    }
}