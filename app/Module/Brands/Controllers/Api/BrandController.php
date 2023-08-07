<?php

declare(strict_types=1);


namespace App\Module\Brands\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Brands\Models\Brand;
use App\Module\Brands\Repositories\Contracts\BrandRepositoryInterface;
use App\Module\Brands\Requests\CreateBrandRequests;
use App\Module\Brands\Resources\BrandsResource;
use App\Module\Brands\Services\Contracts\BrandServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class BrandController extends Controller
{
    public function __construct(
        private BrandServiceInterface $service,
        private BrandRepositoryInterface $repository,
    ) {
    }

    public function store(CreateBrandRequests $request)
    {
        session_start();
        $model          = new Brand();
        $model->title   = $request->input('title');
        $this->repository->create($model);


        $_SESSION['success'] = 'Успешно добавлено';
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $models = $this->service->getAll($request);
        $data = new BrandsResource($models);
        return view('brand.index', ['brands' => $data->toArray(request())]);
    }

    public function destroy(int $id)
    {
        session_start();

        $this->repository->delete($id);

        $_SESSION['success'] = 'Успешно добавлено';
        return redirect()->back();
    }
}
