<?php

namespace CatApp\Breed\Application\Remove;

use CatApp\Breed\Domain\Breed;
use CatApp\Shared\Domain\BreedId;

class RemoveBreedCommandHandler {
    private BreedRemover $remover;

    public function __construct(BreedRemover $remover){
        $this->remover = $remover;
    }

    public function __invoke(RemoveBreedCommand $command): Breed {
        $id = new BreedId($command->id());
        return $this->remover->__invoke($id);
    }
}