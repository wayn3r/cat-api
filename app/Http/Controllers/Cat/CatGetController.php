<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cat\GetRequest;
use CatApp\Cat\Application\Find\CatFinder;
use CatApp\Cat\Application\Find\FindCatQuery;
use CatApp\Cat\Application\Find\FindCatQueryHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use Illuminate\Http\JsonResponse;

class CatGetController extends Controller {
    
    public function __invoke(GetRequest $request):JsonResponse {
        $id = intval($request->get('id'));
        $query = new FindCatQuery($id ?: FindCatQuery::EMPTY_ID);
        $repository = new MySqlCatRepository;
        $finder = new CatFinder($repository);
        $handler = new FindCatQueryHandler($finder);
        $cats = $handler->__invoke($query);
        return new JsonResponse($cats);
    }
    
}