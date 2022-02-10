<?php

namespace CatApp\Breed\Infrastructure;

use App\Models\Breed as ModelsBreed;
use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedId;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedRepository;

class MySqlBreedRepository implements BreedRepository {

    public function record(Breed $breed): Breed {
        $model = new ModelsBreed;
        if($breed->id()){
            $model->id = $breed->id();
            $model->exists = true;
        }
        $model->name = $breed->name();
        $model->save();
        return Breed::fromPrimitive($model->toArray());
    }

    public function remove(Breed $breed): Breed {
        $model = ModelsBreed::find($breed->id());
        $model->delete();
        return Breed::fromPrimitive($model->toArray());
    }

    public function findById(BreedId $id): ?Breed {
        $model = ModelsBreed::find($id->value());
        return Breed::fromPrimitive($model->toArray());
    }
    
    public function findByName(BreedName $name): array {
        $breedName = $name->value();
        $breeds = ModelsBreed::where('name','like',"%$breedName%")
            ->limit(100)
            ->get(['id','name'])
            ->map(
                fn(ModelsBreed $breed) => Breed::fromPrimitive($breed->toArray())
            );
        return $breeds->toArray();
    }
}