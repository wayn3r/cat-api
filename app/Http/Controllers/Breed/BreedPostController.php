<?php

namespace App\Http\Controllers\Breed;

use CatApp\Breed\Application\Save\BreedCreator;
use CatApp\Breed\Application\Save\CreateBreedCommand;
use CatApp\Breed\Application\Save\CreateBreedCommandHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Breed\PostRequest;
use Illuminate\Http\JsonResponse;
class BreedPostController extends Controller {


    public function __invoke(PostRequest $request): JsonResponse {

        $command = new CreateBreedCommand($request->name);
        $repository = new MySqlBreedRepository();
        $creator = new BreedCreator($repository);
        $handler = new CreateBreedCommandHandler($creator);

        $breed = $handler->__invoke($command);
        return new JsonResponse($breed);
    }

    
}
