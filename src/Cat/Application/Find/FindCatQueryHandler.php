<?php 

namespace CatApp\Cat\Application\Find;

use CatApp\Cat\Domain\CatName;

class FindCatQueryHandler {
    private CatFinder $finder;
    
    public function __construct(CatFinder $finder){
        $this->finder = $finder;
    }

    public function __invoke(FindCatQuery $query): array {
        $name = new CatName($query->name());
        return $this->finder->find($name);
    }
}