<?php

namespace App\Http\Controllers\Breed;

use App\Http\Controllers\Controller;
use CatApp\Breed\Application\Remove\BreedRemover;
use CatApp\Breed\Application\Remove\RemoveBreedCommand;
use CatApp\Breed\Application\Remove\RemoveBreedCommandHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use Illuminate\Http\JsonResponse;

class BreedDeleteController extends Controller{

    public function __invoke($_, string $id): JsonResponse {
        $command = new RemoveBreedCommand($id);
        $repository = new MySqlBreedRepository();
        $remover = new BreedRemover($repository);
        $handler = new RemoveBreedCommandHandler($remover);
        $breed = $handler->__invoke($command);
        return new JsonResponse($breed, 200);
    }
}