<?php

namespace CatApp\Breed\Domain;

interface BreedRepository {
    public function record(Breed $breed): Breed;
    public function findById(BreedId $id): ?Breed;
    public function remove(Breed $breed): Breed;
    /**
     * @return Breed[]
     */
    public function findByName(BreedName $name): array;
    
}