<?php

namespace App\Http\Controllers\Breed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Breed\GetRequest;
use CatApp\Breed\Application\Find\BreedFinder;
use CatApp\Breed\Application\Find\FindBreedQuery;
use CatApp\Breed\Application\Find\FindBreedQueryHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use Illuminate\Http\JsonResponse;

class BreedGetController extends Controller {
    
    public function __invoke(GetRequest $request):JsonResponse {
        $query = new FindBreedQuery($request->query('q'));
        $repository = new MySqlBreedRepository;
        $finder = new BreedFinder($repository);
        $handler = new FindBreedQueryHandler($finder);
        $breeds = $handler->__invoke($query);
        return new JsonResponse($breeds);
    }
    
}