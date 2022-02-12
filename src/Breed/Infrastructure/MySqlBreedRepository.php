<?php

namespace CatApp\Breed\Infrastructure;

use App\Models\Breed as BreedModel;
use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedRepository;
use CatApp\Shared\Domain\BreedId;

class MySqlBreedRepository implements BreedRepository {

    public function record(Breed $breed): Breed {
        $model = new BreedModel;
        if($breed->id()){
            $model->id = $breed->id();
            $model->exists = true;
        }
        $model->name = $breed->name();
        $model->save();
        return Breed::fromPrimitive($model->toArray());
    }

    public function remove(Breed $breed): Breed {
        $model = BreedModel::find($breed->id());
        $model->delete();
        return Breed::fromPrimitive($model->toArray());
    }

    public function findById(BreedId $id): ?Breed {
        $model = BreedModel::find($id->value());

        if($model === null){
            return null;
        }

        return Breed::fromPrimitive($model->toArray());
    }
    
    public function findByName(BreedName $name): array {
        $breedName = $name->value();
        $breeds = BreedModel::where('name','like',"%$breedName%")
            ->limit(100)
            ->get()
            ->map(
                fn(BreedModel $breed) => Breed::fromPrimitive($breed->toArray())
            );
        return $breeds->toArray();
    }
}