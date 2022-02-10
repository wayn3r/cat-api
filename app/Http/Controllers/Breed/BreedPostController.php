<?php

namespace App\Http\Controllers\Breed;

use CatApp\Breed\Application\Save\BreedCreator;
use CatApp\Breed\Application\Save\CreateBreedCommand;
use CatApp\Breed\Application\Save\CreateBreedCommandHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use App\Http\Controllers\Controller;
use CatApp\Breed\Domain\Breed;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class BreedPostController extends Controller {

   
    private function save(string $name): Breed {
        $repository = new MySqlBreedRepository();
        $creator = new BreedCreator($repository);
        $handler = new CreateBreedCommandHandler($creator);

        $command = new CreateBreedCommand($name);
        return $handler->__invoke($command);
    }

    public function __invoke(Request $request): JsonResponse {
        if(empty($request->name)) {
            return new JsonResponse(['error' => 'Name is required'], 400);
        }
        
        $breed = $this->save($request->name);
        return new JsonResponse($breed);
    }

    
}
