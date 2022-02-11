<?php

namespace CatApp\Breed\Application\Find;

use CatApp\Breed\Domain\Breed;
use CatApp\Shared\Domain\BreedId;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedNotExist;
use CatApp\Breed\Domain\BreedRepository;

class BreedFinder {

    private $repository;

    public function __construct(BreedRepository $repository) {
        $this->repository = $repository;
    }

    public function findById(BreedId $id): Breed {
        $breed = $this->repository->findById($id);
        if($breed === null) {
            throw new BreedNotExist($id);
        }
        return $breed;
    }

    public function find(BreedName $name): array {
        return $this->repository->findByName($name);
    }

}