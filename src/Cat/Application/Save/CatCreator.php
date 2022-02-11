<?php

namespace CatApp\Cat\Application\Save;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatRepository;

class CatCreator {

    private CatRepository $repository;

    public function __construct(CatRepository $repository) {
        $this->repository = $repository;
    }

    public function __invoke(CatName $name): Cat {
        $cat = new Cat(null, $name);
        return $this->repository->record($cat);
    }
}