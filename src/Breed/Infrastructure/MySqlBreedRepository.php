<?php

namespace CatApp\Breed\Infrastructure;

use CatApp\Breed\Domain\Breed;
use CatApp\Breed\Domain\BreedName;
use CatApp\Breed\Domain\BreedRepository;
use CatApp\Shared\Domain\BreedId;
use CatApp\Shared\Domain\BreedInUse;
use Illuminate\Database\QueryException;

class MySqlBreedRepository implements BreedRepository {

    public function record(Breed $breed): Breed {
        $model = new EloquentBreedModel;
        if($breed->id()){
            $model->id = $breed->id();
            $model->exists = true;
        }
        $model->name = $breed->name();
        $model->save();
        return Breed::fromPrimitive($model->toArray());
    }

    public function remove(Breed $breed): Breed {
        $model = EloquentBreedModel::find($breed->id());
        try{
            $model->delete();
        }catch(QueryException $e){
            if(in_array(BreedInUse::ERROR_CODE, $e->errorInfo)){
                throw new BreedInUse(new BreedId($breed->id()));
            }
        }
        return Breed::fromPrimitive($model->toArray());
    }

    public function findById(BreedId $id): ?Breed {
        $model = EloquentBreedModel::find($id->value());

        if($model === null){
            return null;
        }

        return Breed::fromPrimitive($model->toArray());
    }
    
    public function findByName(BreedName $name): array {
        $breedName = $name->value();
        $breeds = EloquentBreedModel::where('name','like',"%$breedName%")
            ->limit(100)
            ->get()
            ->map(
                fn(EloquentBreedModel $breed) => Breed::fromPrimitive($breed->toArray())
            );
        return $breeds->toArray();
    }
}