<?php

namespace App\Http\Controllers\Breed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Breed\PutRequest;
use CatApp\Breed\Application\Update\BreedRenamer;
use CatApp\Breed\Application\Update\RenameBreedCommand;
use CatApp\Breed\Application\Update\RenameBreedCommandHandler;
use CatApp\Breed\Infrastructure\MySqlBreedRepository;
use Illuminate\Http\JsonResponse;

class BreedPutController extends Controller{
   
    public function __invoke(PutRequest $request): JsonResponse {

        $command = new RenameBreedCommand($request->id, $request->name);
        $repository = new MySqlBreedRepository();
        $renamer = new BreedRenamer($repository);
        $handler = new RenameBreedCommandHandler($renamer);
        $breed = $handler->__invoke($command);
      
        return new JsonResponse($breed, 200);
    }
}