<?php

namespace CatApp\Breed\Application\Save;

use CatApp\Breed\Domain\BreedName;

class CreateBreedCommandHandler {
    private BreedCreator $creator;

    public function __construct(BreedCreator $creator) {
        $this->creator = $creator;
    }

    public function __invoke(CreateBreedCommand $command) {
        $name = new BreedName($command->name());
        return $this->creator->__invoke($name);
    }
}