<?php

namespace App\Exceptions;

use CatApp\Breed\Domain\BreedNotExist;
use CatApp\Cat\Domain\CatNotExist;
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
        $exceptiions = [
            BreedNotExist::class => 404,
            CatNotExist::class => 404
        ];
        $status = @$exceptiions[get_class($e)];

        if($status === null){
            return parent::render($request, $e);
        }
        
        return new JsonResponse(['error' => $e->getMessage()], $status);
    }
}
