<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Định nghĩa các route cho ứng dụng.
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Định nghĩa các route API.
     */
    protected $namespace = 'App\\Http\\Controllers';
    protected $apiNamespace = 'App\\Http\\Controllers\\API';

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    

    /**
     * Định nghĩa các route Web.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Http\Controllers')  // Chỉ rõ không gian tên cho controller
            ->group(base_path('routes/web.php'));
    }

    /**
     * Đăng ký các dịch vụ trong ứng dụng.
     */
    public function register(): void
    {
        //
    }

    /**
     * Khởi động các dịch vụ trong ứng dụng.
     */
    public function boot(): void
    {
        //
    }
}
