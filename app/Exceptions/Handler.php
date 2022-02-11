<?php

namespace App\Exceptions;

use App\Http\Controllers\ValidationError;
use CatApp\Breed\Domain\BreedNotExist;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (BreedNotExist $e) {
            return new JsonResponse(['error' => $e->getMessage()], 404);
        });
    }

    public function render($request, Throwable $e){
        if($e instanceof BreedNotExist){
            return new JsonResponse(['error' => $e->getMessage()], 404);
        }
        if($e instanceof ValidationError){
            return new JsonResponse(['error' => $e->errors()], 404);
        }
        return parent::render($request, $e);
    }
}
