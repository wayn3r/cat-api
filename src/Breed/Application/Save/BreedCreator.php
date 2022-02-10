<?php

namespace CatApp\Breed\Application\Save;

use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedRepository;

class BreedCreator {

    private BreedRepository $repository;

    public function __construct(BreedRepository $repository) {
        $this->repository = $repository;
    }

    public function __invoke(BreedName $name): Breed {
        $breed = new Breed(null, $name);
        return $this->repository->record($breed);
    }
}