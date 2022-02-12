<?php 

namespace CatApp\Cat\Application\Find;

use CatApp\Cat\Domain\CatId;

class FindCatQueryHandler {
    private CatFinder $finder;
    
    public function __construct(CatFinder $finder){
        $this->finder = $finder;
    }

    public function __invoke(FindCatQuery $query):array {
        if($query->id() === $query::EMPTY_ID){
            return $this->finder->findAll();
        }
        $id = new CatId($query->id());
        return [$this->finder->findById($id)];
    }
}