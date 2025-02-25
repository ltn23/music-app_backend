<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Đăng ký các route cho ứng dụng.
     */
    public function boot(): void
{
    parent::boot();

    $this->mapApiRoutes(); // Kiểm tra xem phương thức này đã được gọi chưa
}

protected function mapApiRoutes()
{
    Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php')); // Đảm bảo rằng đường dẫn đúng
}

}
