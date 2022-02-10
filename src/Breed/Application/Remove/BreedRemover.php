<?php

namespace CatApp\Breed\Application\Remove;

use CatApp\Breed\Application\Find\BreedFinder;
use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedId;
use CatApp\Breed\Domain\BreedRepository;

class BreedRemover {

    private BreedRepository $repository;
    private BreedFinder $finder;

    public function __construct(BreedRepository $repository) {
        $this->repository = $repository;
        $this->finder = new BreedFinder($repository);
    }

    public function __invoke(BreedId $id): Breed {
        $breed = $this->finder->findById($id);
        $this->repository->remove($breed);
        return $breed;
    }
}