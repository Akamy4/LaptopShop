<?php

declare(strict_types=1);


namespace App\Module\VideoCard\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Brands\Models\Brand;
use App\Module\Models\Models\Models;
use App\Module\VideoCard\Models\VideoCard;
use App\Module\VideoCard\Repositories\Contracts\VideoCardRepositoryInterface;
use App\Module\VideoCard\Requests\CreateVideoCardRequest;
use App\Module\VideoCard\Services\Contracts\VideoCardServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class VideoCardController extends Controller
{
    public function __construct(
        private VideoCardServiceInterface $service,
        private VideoCardRepositoryInterface $repository,
    ) {
    }

    public function store(CreateVideoCardRequest $request)
    {
        session_start();
        $model            = new VideoCard();
        $model->brand_id  = $request->input('brandId');
        $model->model_id  = $request->input('modelId');
        $model->frequency = $request->input('frequency');
        $model->memory    = $request->input('memory');
        $this->repository->create($model);

        $_SESSION['success'] = 'Успешно';

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $videoCards = $this->service->getAll($request);
        return view('videocard.index', ['videoCards' => $videoCards]);
    }

    public function destroy(int $id)
    {
        session_start();
        $this->repository->delete($id);
        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }

    public function storePage()
    {
        session_start();
        $brands = Brand::all();
        $models = Models::all();

        return view('videocard.store', [
            'brands' => $brands,
            'models' => $models
        ]);
    }
}
