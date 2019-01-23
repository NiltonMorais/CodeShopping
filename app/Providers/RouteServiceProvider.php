<?php

namespace CodeShopping\Providers;

use CodeShopping\Common\OnlyTrashed;
use CodeShopping\Models\Category;
use CodeShopping\Models\Product;
use CodeShopping\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    use OnlyTrashed;

    protected $namespace = 'CodeShopping\Http\Controllers';

    public function boot()
    {
        //

        parent::boot();

        Route::bind('category', function($value){
            /* @var Collection $collection */
            $collection = Category::whereId($value)->orWhere('slug',$value)->get();
            return $collection->first();
        });

        Route::bind('product', function($value){
            /** @var Builder $query */
            $query = Product::query();
            $request = app(Request::class);
            $query = $this->onlyTrashedIfRequested($request, $query);

            /* @var Collection $collection */
            $collection = $query->whereId($value)->orWhere('slug',$value)->get();
            return $collection->first();
        });

        Route::bind('user', function($value){
            /** @var Builder $query */
            $query = User::query();
            $request = app(Request::class);
            $query = $this->onlyTrashedIfRequested($request, $query);
            return $query->find($value);
        });
    }

    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
