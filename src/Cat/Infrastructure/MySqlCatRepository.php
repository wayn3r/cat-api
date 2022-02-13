<?php

namespace CatApp\Cat\Infrastructure;

use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatRepository;
use CatApp\Shared\Domain\BreedId;
use CatApp\Shared\Domain\BreedNotExist;
use Illuminate\Database\QueryException;

class MySqlCatRepository implements CatRepository {

    public function record(Cat $cat): Cat {
        $model = new EloquentCatModel;
        if($cat->id()){
            $model->id = $cat->id();
            $model->exists = true;
        }

        $model->breedId = $cat->breedId();
        $model->name = $cat->name();
        $model->description = $cat->description();
        $model->longitude = $cat->longitude();
        $model->latitude = $cat->latitude();

        try{
            $model->save();
        }catch(QueryException $e){
            if(in_array(BreedNotExist::ERROR_CODE, $e->errorInfo)){
                throw new BreedNotExist(new BreedId($cat->breedId()));
            }
        }
        return Cat::fromPrimitive($model->toArray());
    }

    public function remove(Cat $cat): Cat {
        $model = EloquentCatModel::find($cat->id());
        $model->delete();
        return Cat::fromPrimitive($model->toArray());
    }

    public function findById(CatId $id): ?Cat {
        $model = EloquentCatModel::find($id->value());
        if($model === null){
            return null;
        }
        return Cat::fromPrimitive($model->toArray());
    }
    
    public function list(): array {
        $cats = EloquentCatModel::all()->map(
            fn(EloquentCatModel $cat) => Cat::fromPrimitive($cat->toArray())
        );
        return $cats->toArray();
    }
}