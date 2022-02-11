<?php

namespace CatApp\Cat\Application\Save;

use CatApp\Cat\Domain\CatName;

class CreateCatCommandHandler {
    private CatCreator $creator;

    public function __construct(CatCreator $creator) {
        $this->creator = $creator;
    }

    public function __invoke(CreateCatCommand $command) {
        $name = new CatName($command->name());
        return $this->creator->__invoke($name);
    }
}