<?php

namespace CatApp\Cat\Application\Update;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatName;

class UpdateCatCommandHandler {
    private CatUpdater $updater;
    
    public function __construct(CatUpdater $updater) {
        $this->updater = $updater;
    }

    public function __invoke(UpdateCatCommand $command): Cat {
        $cat = $this->updater->__invoke(
            new CatId($command->id()),
            new CatName($command->name())
        );

        return $cat;
    }
}
