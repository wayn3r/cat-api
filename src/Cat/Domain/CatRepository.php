<?php

namespace CatApp\Cat\Domain;

interface CatRepository {
    public function record(Cat $cat): Cat;
    public function findById(CatId $id): ?Cat;
    public function remove(Cat $cat): Cat;
    /**
     * @return Cat[]
     */
    public function findByName(CatName $name): array;
    
}