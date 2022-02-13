<?php

namespace CatApp\Cat\Infrastructure;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EloquentCatModel extends Model
{
    use HasFactory;
    protected $table = 'cats';
}
