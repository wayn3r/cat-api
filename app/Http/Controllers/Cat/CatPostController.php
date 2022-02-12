<?php

namespace App\Http\Controllers\Cat;

use CatApp\Cat\Application\Save\CatCreator;
use CatApp\Cat\Application\Save\CreateCatCommand;
use CatApp\Cat\Application\Save\CreateCatCommandHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cat\PostRequest;
use Illuminate\Http\JsonResponse;
class CatPostController extends Controller {

    public function __invoke(PostRequest $request): JsonResponse {
        $repository = new MySqlCatRepository();
        $creator = new CatCreator($repository);
        $handler = new CreateCatCommandHandler($creator);

        $command = new CreateCatCommand(
            $request->name, 
            $request->breedId, 
            $request->description, 
            $request->longitude, 
            $request->latitude
        );

        $cat = $handler->__invoke($command);

        return new JsonResponse($cat);
    }

    
}
