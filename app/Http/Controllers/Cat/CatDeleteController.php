<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cat\DeleteRequest;
use CatApp\Cat\Application\Remove\CatRemover;
use CatApp\Cat\Application\Remove\RemoveCatCommand;
use CatApp\Cat\Application\Remove\RemoveCatCommandHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use Illuminate\Http\JsonResponse;

class CatDeleteController extends Controller{

    public function __invoke(DeleteRequest $request): JsonResponse {

        $command = new RemoveCatCommand($request->id);
        $repository = new MySqlCatRepository();
        $remover = new CatRemover($repository);
        $handler = new RemoveCatCommandHandler($remover);

        $cat = $handler->__invoke($command);
        return new JsonResponse($cat, 200);
    }
}