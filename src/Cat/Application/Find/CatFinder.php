<?php

namespace CatApp\Cat\Application\Find;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatNotExist;
use CatApp\Cat\Domain\CatRepository;

class CatFinder {

    private $repository;

    public function __construct(CatRepository $repository) {
        $this->repository = $repository;
    }

    public function findById(CatId $id): Cat {
        $cat = $this->repository->findById($id);
        if($cat === null) {
            throw new CatNotExist($id);
        }
        return $cat;
    }

    public function find(CatName $name): array {
        return $this->repository->findByName($name);
    }

}