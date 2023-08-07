<?php

declare(strict_types=1);


namespace App\Module\Processors\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Brands\Models\Brand;
use App\Module\Models\Models\Models;
use App\Module\Processors\Models\Processor;
use App\Module\Processors\Repositories\Contracts\ProcessorRepositoryInterface;
use App\Module\Processors\Requests\CreateProcessorRequest;
use App\Module\Processors\Services\Contracts\ProcessorServiceInterface;
use App\Module\Type\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ProcessorController extends Controller
{
    public function __construct(
        private ProcessorServiceInterface $service,
        private ProcessorRepositoryInterface $repository,
    ) {
    }

    public function store(CreateProcessorRequest $request)
    {
        session_start();

        $model            = new Processor();
        $model->brand_id  = (int)$request->input('brandId');
        $model->type_id   = (int)$request->input('typeId');
        $model->model_id  = (int)$request->input('modelId');
        $model->frequency = (float)$request->input('frequency');
        $model->core = (float)$request->input('core');
        $model->thread = (float)$request->input('thread');
        $this->repository->create($model);

        $_SESSION['success'] = 'Успешно';

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $models = $this->service->getAll($request);
        return view('processor.index', ['processors' => $models]);
    }

    public function storePage()
    {
        $brands = Brand::all();
        $types = Type::all();
        $models = Models::all();

        return view('processor.store', [
           'types' => $types,
           'brands' => $brands,
           'models' => $models
        ]);
    }

    public function destroy(int $id)
    {
        session_start();
        $this->repository->delete($id);
        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }
}
