<?php

namespace CatApp\Cat\Application\Save;

use CatApp\Cat\Domain\CatDescription;
use CatApp\Cat\Domain\CatLatitude;
use CatApp\Cat\Domain\CatLongitude;
use CatApp\Cat\Domain\CatName;
use CatApp\Shared\Domain\BreedId;

class CreateCatCommandHandler {
    private CatCreator $creator;

    public function __construct(CatCreator $creator) {
        $this->creator = $creator;
    }

    public function __invoke(CreateCatCommand $command) {
        $name = new CatName($command->name());
        $breedId = new BreedId($command->breedId());
        $description = new CatDescription($command->description());
        $longitude = new CatLongitude($command->longitude());
        $latitude = new CatLatitude($command->latitude());
        return $this->creator->__invoke($name, $breedId, $description, $longitude, $latitude);
    }
}