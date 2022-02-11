<?php

namespace CatApp\Cat\Infrastructure;

use App\Models\Cat as ModelsCat;
use CatApp\Cat\Domain\Cat;
use CatApp\Cat\Domain\CatId;
use CatApp\Cat\Domain\CatName;
use CatApp\Cat\Domain\CatRepository;

class MySqlCatRepository implements CatRepository {

    public function record(Cat $cat): Cat {
        $model = new ModelsCat;
        if($cat->id()){
            $model->id = $cat->id();
            $model->exists = true;
        }
        $model->name = $cat->name();
        $model->breedId = $cat->breed();
        $model->description = $cat->description();
        $model->longitude = $cat->longitude();
        $model->latitude = $cat->latitude();
        $model->save();
        return Cat::fromPrimitive($model->toArray());
    }

    public function remove(Cat $cat): Cat {
        $model = ModelsCat::find($cat->id());
        $model->delete();
        return Cat::fromPrimitive($model->toArray());
    }

    public function findById(CatId $id): ?Cat {
        $model = ModelsCat::find($id->value());
        return Cat::fromPrimitive($model->toArray());
    }
    
    public function findByName(CatName $name): array {
        $catName = $name->value();
        $cats = ModelsCat::where('name','like',"%$catName%")
            ->limit(100)
            ->get()
            ->map(
                fn(ModelsCat $cat) => Cat::fromPrimitive($cat->toArray())
            );
        return $cats->toArray();
    }
}