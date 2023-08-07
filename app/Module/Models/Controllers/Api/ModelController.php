<?php

declare(strict_types=1);


namespace App\Module\Models\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Models\Models\Models;
use App\Module\Models\Repositories\Contracts\ModelRepositoryInterface;
use App\Module\Models\Requests\CreateModelRequest;
use App\Module\Models\Services\Contracts\ModelServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ModelController extends Controller
{
    public function __construct(
        private ModelServiceInterface $service,
        private ModelRepositoryInterface $repository,
    ) {
    }

    public function store(CreateModelRequest $request)
    {
        session_start();
        $model          = new Models();
        $model->title   = $request->input('title');
        $this->repository->create($model);

        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $models = $this->service->getAll($request);
        return view('model.main', ['models' => $models]);
    }

    public function destroy(int $id)
    {
        session_start();
        $_SESSION['success'] = 'Успешно';
        $this->repository->delete($id);
        return redirect()->back();
    }
}
