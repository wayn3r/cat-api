<?php

namespace CatApp\Breed\Application\Update;

use CatApp\Breed\Application\Find\BreedFinder;
use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedRepository;
use CatApp\Shared\Domain\BreedId;

class BreedRenamer {
    
    private BreedRepository $repository;
    private BreedFinder $finder;

    public function __construct(BreedRepository $repository) {
        $this->repository = $repository;
        $this->finder = new BreedFinder($repository);
    }

    public function __invoke(BreedId $id, BreedName $name): Breed {
        $breed = $this->finder->findById($id);
        $breed->rename($name);
        return $this->repository->record($breed);
    }
}