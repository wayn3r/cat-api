<?php

namespace CatApp\Breed\Application\Update;

use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedId;
use CatApp\Breed\Domain\BreedName;

class RenameBreedCommandHandler {
    private BreedRenamer $renamer;
    
    public function __construct(BreedRenamer $renamer) {
        $this->renamer = $renamer;
    }

    public function __invoke(RenameBreedCommand $command): Breed {
        $breed = $this->renamer->__invoke(
            new BreedId($command->id()),
            new BreedName($command->name())
        );

        return $breed;
    }
}
