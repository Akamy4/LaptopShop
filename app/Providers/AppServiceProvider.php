<?php

namespace App\Providers;

use App\Module\Brands\Repositories\BrandRepository;
use App\Module\Brands\Repositories\Contracts\BrandRepositoryInterface;
use App\Module\Brands\Services\BrandService;
use App\Module\Laptops\Repositories\Contracts\LaptopRepositoryInterface;
use App\Module\Laptops\Repositories\LaptopRepository;
use App\Module\Laptops\Services\Contracts\LaptopServiceInterface;
use App\Module\Laptops\Services\LaptopService;
use App\Module\Models\Repositories\ModelRepository;
use App\Module\Models\Services\ModelService;
use App\Module\Orders\Repositories\Contracts\OrderItemRepositoryInterface;
use App\Module\Orders\Repositories\Contracts\OrderRepositoryInterface;
use App\Module\Orders\Repositories\OrderItemRepository;
use App\Module\Orders\Repositories\OrderRepository;
use App\Module\Orders\Services\Contracts\OrderItemServiceInterface;
use App\Module\Orders\Services\Contracts\OrderServiceInterface;
use App\Module\Orders\Services\OrderItemService;
use App\Module\Orders\Services\OrderService;
use App\Module\Processors\Services\Contracts\ProcessorServiceInterface;
use App\Module\Processors\Repositories\Contracts\ProcessorRepositoryInterface;
use App\Module\Processors\Repositories\ProcessorRepository;
use App\Module\Processors\Services\ProcessorService;
use App\Module\Type\Repositories\Contracts\TypeRepositoryInterface;
use App\Module\Type\Repositories\TypeRepository;
use App\Module\Brands\Services\Contracts\BrandServiceInterface;
use App\Module\Models\Repositories\Contracts\ModelRepositoryInterface;
use App\Module\VideoCard\Repositories\Contracts\VideoCardRepositoryInterface;
use App\Module\VideoCard\Repositories\VideoCardRepository;
use App\Module\Type\Services\Contracts\TypeServiceInterface;
use App\Module\Type\Services\TypeService;
use App\Module\Users\Repositories\Contracts\UserRepositoryInterface;
use App\Module\Users\Services\Contracts\UserServiceInterface;
use App\Module\Users\Repositories\UserRepository;
use App\Module\Users\Services\UserService;
use App\Module\Models\Services\Contracts\ModelServiceInterface;
use App\Module\VideoCard\Services\Contracts\VideoCardServiceInterface;
use App\Module\VideoCard\Services\VideoCardService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(ModelRepositoryInterface::class, ModelRepository::class);
        $this->app->bind(ModelServiceInterface::class, ModelService::class);

        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(BrandServiceInterface::class, BrandService::class);

        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
        $this->app->bind(TypeServiceInterface::class, TypeService::class);

        $this->app->bind(ProcessorRepositoryInterface::class, ProcessorRepository::class);
        $this->app->bind(ProcessorServiceInterface::class, ProcessorService::class);

        $this->app->bind(VideoCardRepositoryInterface::class, VideoCardRepository::class);
        $this->app->bind(VideoCardServiceInterface::class, VideoCardService::class);

        $this->app->bind(LaptopRepositoryInterface::class, LaptopRepository::class);
        $this->app->bind(LaptopServiceInterface::class, LaptopService::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);

        $this->app->bind(OrderItemServiceInterface::class, OrderItemService::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }
}
