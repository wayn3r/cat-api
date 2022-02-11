<?php

namespace CatApp\Cat\Application\Remove;

use CatApp\Cat\Application\Find\CatFinder;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatRepository;

class CatRemover {

    private CatRepository $repository;
    private CatFinder $finder;

    public function __construct(CatRepository $repository) {
        $this->repository = $repository;
        $this->finder = new CatFinder($repository);
    }

    public function __invoke(CatId $id): Cat {
        $cat = $this->finder->findById($id);
        $this->repository->remove($cat);
        return $cat;
    }
}