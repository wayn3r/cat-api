<?php

namespace CatApp\Cat\Infrastructure;

use App\Models\Breed;
use App\Models\Cat as CatModel;
use CatApp\Breed\Domain\BreedNotExist;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatRepository;
use CatApp\Shared\Domain\BreedId;

class MySqlCatRepository implements CatRepository {

    public function record(Cat $cat): Cat {
        $model = new CatModel;
        if($cat->id()){
            $model->id = $cat->id();
            $model->exists = true;
        }

        if(!Breed::find($cat->breedId())){
            throw new BreedNotExist(new BreedId($cat->breedId()));
        }

        $model->breedId = $cat->breedId();

        $model->name = $cat->name();
        $model->description = $cat->description();
        $model->longitude = $cat->longitude();
        $model->latitude = $cat->latitude();
        $model->save();
        return Cat::fromPrimitive($model->toArray());
    }

    public function remove(Cat $cat): Cat {
        $model = CatModel::find($cat->id());
        $model->delete();
        return Cat::fromPrimitive($model->toArray());
    }

    public function findById(CatId $id): ?Cat {
        $model = CatModel::find($id->value());
        if($model === null){
            return null;
        }
        return Cat::fromPrimitive($model->toArray());
    }
    
    public function list(): array {
        $cats = CatModel::all()->map(
            fn(CatModel $cat) => Cat::fromPrimitive($cat->toArray())
        );
        return $cats->toArray();
    }
}