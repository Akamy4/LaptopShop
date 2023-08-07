<?php

declare(strict_types=1);


namespace App\Module\Type\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Type\Models\Type;
use App\Module\Type\Repositories\Contracts\TypeRepositoryInterface;
use App\Module\Type\Requests\CreateTypeRequests;
use App\Module\Type\Resources\TypesResource;
use App\Module\Type\Services\Contracts\TypeServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class TypeController extends Controller
{
    public function __construct(
        private TypeServiceInterface $service,
        private TypeRepositoryInterface $repository,
    ) {
    }

    public function store(CreateTypeRequests $request)
    {
        session_start();
        $model          = new Type();
        $model->title   = $request->input('title');
        $this->repository->create($model);

        $_SESSION['success'] = 'Успешно добавлено';
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $models = $this->service->getAll($request);
        $data = new TypesResource($models);
        return view('type.index', ['types' => $data->toArray(request())]);
    }

    public function destroy(int $id)
    {
        session_start();
        $this->repository->delete($id);

        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }
}
