<?php

namespace App\Http\Controllers\Cat;

use CatApp\Cat\Application\Save\CatCreator;
use CatApp\Cat\Application\Save\CreateCatCommand;
use CatApp\Cat\Application\Save\CreateCatCommandHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use App\Http\Controllers\Controller;
use CatApp\Cat\Domain\Cat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class CatPostController extends Controller {

   
    private function save(string $name): Cat {
        $repository = new MySqlCatRepository();
        $creator = new CatCreator($repository);
        $handler = new CreateCatCommandHandler($creator);

        $command = new CreateCatCommand($name);
        return $handler->__invoke($command);
    }

    public function __invoke(Request $request): JsonResponse {
        if(empty($request->name)) {
            return new JsonResponse(['error' => 'Name is required'], 400);
        }
        
        $Cat = $this->save($request->name);
        return new JsonResponse($Cat);
    }

    
}
