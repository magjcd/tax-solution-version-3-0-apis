<?php

namespace App\Providers;

use App\Repositories\Classes\AuthClass;
use App\Repositories\Classes\BranchOfficeClass;
use App\Repositories\Classes\ClientClass;
use App\Repositories\Classes\FeeTypeClass;
use App\Repositories\Classes\GeneralClass;
use App\Repositories\Classes\JVClass;
use App\Repositories\Classes\RetTrkClass;
use App\Repositories\Classes\RTOClass;
use App\Repositories\Classes\UserClass;
use App\Repositories\Interfaces\AuthInterface;
use App\Repositories\Interfaces\BranchOfficeInterface;
use App\Repositories\Interfaces\ClientInterface;
use App\Repositories\Interfaces\FeeTypeInterface;
use App\Repositories\Interfaces\GeneralInterface;
use App\Repositories\Interfaces\JVInterface;
use App\Repositories\Interfaces\RetTrkInterface;
use App\Repositories\Interfaces\RTOInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthInterface::class, AuthClass::class);
        $this->app->bind(UserInterface::class, UserClass::class);
        $this->app->bind(ClientInterface::class, ClientClass::class);
        $this->app->bind(GeneralInterface::class, GeneralClass::class);
        $this->app->bind(BranchOfficeInterface::class, BranchOfficeClass::class);
        $this->app->bind(RTOInterface::class, RTOClass::class);
        $this->app->bind(FeeTypeInterface::class, FeeTypeClass::class);
        $this->app->bind(RetTrkInterface::class, RetTrkClass::class);
        $this->app->bind(JVInterface::class, JVClass::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($success, $data, $message, $response_code) {
            return response()->json([
                'success' => $success,
                'data' => $data,
                'message' => $message,
            ], $response_code);
        });

        Response::macro('error', function ($success, $message, $response_code) {
            return response()->json([
                'success' => $success,
                'message' => $message,
            ], $response_code);
        });
    }
}
