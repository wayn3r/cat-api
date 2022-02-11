<?php

namespace App\Http\Controllers\Breed;

use App\Http\Controllers\Controller;
use CatApp\Breed\Application\Find\BreedFinder;
use CatApp\Breed\Application\Find\FindBreedQuery;
use CatApp\Breed\Application\Find\FindBreedQueryHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BreedGetController extends Controller {
    
    public function __invoke(Request $request):JsonResponse {
        $query = new FindBreedQuery($request->search);
        $repository = new MySqlBreedRepository;
        $finder = new BreedFinder($repository);
        $handler = new FindBreedQueryHandler($finder);
        $breeds = $handler->__invoke($query);
        return new JsonResponse($breeds);
    }
    
}