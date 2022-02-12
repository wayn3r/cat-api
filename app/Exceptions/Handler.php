<?php

namespace App\Exceptions;

use CatApp\Cat\Domain\CatNotExist;
use CatApp\Shared\Domain\BreedInUse;
use CatApp\Shared\Domain\BreedNotExist;
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
        $this->renderable(fn (BreedNotExist $e) => $this->response($e, 404));
        $this->renderable(fn (CatNotExist $e) => $this->response($e, 404));
        $this->renderable(fn (BreedInUse $e) => $this->response($e, 400));
    }

    private function response(Throwable $e, int $httpCode): JsonResponse {
        return new JsonResponse(['message' => $e->getMessage()], $httpCode);
    }
}
