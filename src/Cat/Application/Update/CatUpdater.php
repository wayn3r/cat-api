<?php

namespace CatApp\Cat\Application\Update;

use CatApp\Cat\Application\Find\CatFinder;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatRepository;

class CatUpdater {
    
        private CatRepository $repository;
        private CatFinder $finder;
    
        public function __construct(CatRepository $repository) {
            $this->repository = $repository;
            $this->finder = new CatFinder($repository);
        }
    
        public function __invoke(CatId $id, CatName $name): Cat {
            $cat = $this->finder->findById($id);
            $cat->rename($name);
            return $this->repository->record($cat);
        }
}