<?php

namespace CatApp\Cat\Domain;

use DomainException;

class CatNotExist extends DomainException {
    private CatId $id;
    public function __construct(CatId $id){
        $this->id = $id;
        parent::__construct();
        $this->message = $this->errorMessage();
    }
    protected function errorMessage(): string {
        return sprintf('The cat %s does not exist', $this->id->value());
    }
}