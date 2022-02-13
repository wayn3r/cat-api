<?php

namespace CatApp\Cat\Infrastructure;

use CatApp\Breed\Infrastructure\EloquentBreedModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentCatModel extends Model
{
    use HasFactory;
    protected $table = 'cats';

    public function breed()
    {
        return $this->hasOne(EloquentBreedModel::class, 'id', 'breedId');
    }
}
