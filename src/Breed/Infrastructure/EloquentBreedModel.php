<?php

namespace CatApp\Breed\Infrastructure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentBreedModel extends Model
{
    use HasFactory;
    protected $table = 'breeds';
    protected $fillable = ['name'];
}
