<?php

namespace CatApp\Cat\Application\Update;

use CatApp\Cat\Application\Find\CatFinder;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatDescription;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatLatitude;
use CatApp\Cat\Domain\CatLongitude;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatRepository;
use CatApp\Shared\Domain\BreedId;

class CatUpdater {
    
    private CatRepository $repository;
    private CatFinder $finder;

    public function __construct(CatRepository $repository) {
        $this->repository = $repository;
        $this->finder = new CatFinder($repository);
    }

    public function __invoke(
        CatId $id, 
        CatName $name, 
        BreedId $breedId, 
        CatDescription $description, 
        CatLongitude $longitude, 
        CatLatitude $latitude
    ): Cat {
        $cat = $this->finder->findById($id);
        $cat->rename($name);
        $cat->changeBreed($breedId);
        $cat->changeDescription($description);
        $cat->changeLocation($longitude, $latitude);
        return $this->repository->record($cat);
    }
}