<?php 

namespace CatApp\Breed\Application\Find;

use CatApp\Breed\Domain\BreedName;

class FindBreedQueryHandler {
    private BreedFinder $finder;
    
    public function __construct(BreedFinder $finder){
        $this->finder = $finder;
    }

    public function __invoke(FindBreedQuery $query): array {
        $name = new BreedName($query->name());
        return $this->finder->find($name);
    }
}