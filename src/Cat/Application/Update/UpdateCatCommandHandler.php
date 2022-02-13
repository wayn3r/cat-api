<?php

namespace CatApp\Cat\Application\Update;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatDescription;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatLatitude;
use CatApp\Cat\Domain\CatLongitude;
use CatApp\Cat\Domain\CatName;
use CatApp\Shared\Domain\BreedId;

class UpdateCatCommandHandler {
    private CatUpdater $updater;
    
    public function __construct(CatUpdater $updater) {
        $this->updater = $updater;
    }

    public function __invoke(UpdateCatCommand $command): Cat {
        $cat = $this->updater->__invoke(
            new CatId($command->id()),
            new CatName($command->name()),
            new BreedId($command->breedId()),
            new CatDescription($command->description()),
            new CatLongitude($command->longitude()),
            new CatLatitude($command->latitude())
        );

        return $cat;
    }
}
