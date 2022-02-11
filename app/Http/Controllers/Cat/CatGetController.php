<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use CatApp\Cat\Application\Find\CatFinder;
use CatApp\Cat\Application\Find\FindCatQuery;
use CatApp\Cat\Application\Find\FindCatQueryHandler;
use CatApp\Cat\Infrastructure\MySqlCatRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatGetController extends Controller {
    
    public function __invoke(Request $request):JsonResponse {
        $query = new FindCatQuery($request->search);
        $repository = new MySqlCatRepository;
        $finder = new CatFinder($repository);
        $handler = new FindCatQueryHandler($finder);
        $cats = $handler->__invoke($query);
        return new JsonResponse($cats);
    }
    
}