<?php

namespace CatApp\Cat\Application\Save;

use CatApp\Breed\Application\Find\BreedFinder;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatDescription;
use CatApp\Cat\Domain\CatLatitude;
use CatApp\Cat\Domain\CatLongitude;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatRepository;
use CatApp\Shared\Domain\BreedId;

class CatCreator {

    private CatRepository $repository;

    public function __construct(CatRepository $repository) {
        $this->repository = $repository;
    }

    public function __invoke(
        CatName $name, 
        BreedId $breedId, 
        CatDescription $description, 
        CatLongitude $longitude,
        CatLatitude $latitude
    ): Cat {
        $cat = new Cat(null, $name, $breedId, $description, $longitude, $latitude);
        return $this->repository->record($cat);
    }
}