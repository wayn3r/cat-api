<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use CatApp\Cat\Application\Update\CatUpdater;
use CatApp\Cat\Application\Update\UpdateCatCommand;
use CatApp\Cat\Application\Update\UpdateCatCommandHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatPutController extends Controller{

    public function __invoke(Request $request): JsonResponse {

        $command = new UpdateCatCommand($request->id, $request->name);
        $repository = new MySqlCatRepository();
        $updater = new CatUpdater($repository);
        $handler = new UpdateCatCommandHandler($updater);

        $cat = $handler->__invoke($command);
        return new JsonResponse($cat, 200);
    }
}