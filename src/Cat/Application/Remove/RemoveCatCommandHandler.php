<?php

namespace CatApp\Cat\Application\Remove;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;

class RemoveCatCommandHandler {
    private CatRemover $remover;

    public function __construct(CatRemover $remover){
        $this->remover = $remover;
    }

    public function __invoke(RemoveCatCommand $command): Cat {
        $id = new CatId($command->id());
        return $this->remover->__invoke($id);
    }
}