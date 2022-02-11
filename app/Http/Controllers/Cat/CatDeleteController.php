<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use CatApp\Cat\Application\Remove\CatRemover;
use CatApp\Cat\Application\Remove\RemoveCatCommand;
use CatApp\Cat\Application\Remove\RemoveCatCommandHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatDeleteController extends Controller{

    public function __invoke(Request $request): JsonResponse {

        $command = new RemoveCatCommand($request->id);
        $repository = new MySqlCatRepository();
        $remover = new CatRemover($repository);
        $handler = new RemoveCatCommandHandler($remover);

        $cat = $handler->__invoke($command);
        return new JsonResponse($cat, 200);
    }
}