<?php

declare(strict_types=1);


namespace App\Module\Laptops\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Brands\Models\Brand;
use App\Module\Laptops\Models\Laptop;
use App\Module\Laptops\Repositories\Contracts\LaptopRepositoryInterface;
use App\Module\Laptops\Requests\CreateLaptopRequest;
use App\Module\Laptops\Requests\UpdateLaptopRequest;
use App\Module\Laptops\Services\Contracts\LaptopServiceInterface;
use App\Module\Processors\Models\Processor;
use App\Module\VideoCard\Models\VideoCard;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class LaptopController extends Controller
{
    public function __construct(
        private LaptopServiceInterface $service,
        private LaptopRepositoryInterface $repository,
    ) {
    }

    public function store(CreateLaptopRequest $request)
    {
        session_start();
        $model                    = new Laptop();
        $model->title             = $request->input('title');
        $model->brand_id          = $request->input('brandId');
        $model->processor_id      = $request->input('processorId');
        $model->video_card_id     = $request->input('videoCardId');
        $model->ram_memory        = $request->input('ramMemory');
        $model->memory            = $request->input('memory');
        $model->diagonal          = $request->input('diagonal');
        $model->screen_resolution = $request->input('screenResolution');
        $model->quantity          = $request->input('quantity');
        $model->price             = $request->input('price');

        $destinationPath = 'public/images/products';
        $image           = $request->file('image');
        $imageName       = $image->getClientOriginalName();
        $path            = $request->file('image')->storeAs($destinationPath, $imageName);
        $model->image    = $imageName;
        $this->repository->create($model);

        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }

    public function update(int $id, UpdateLaptopRequest $request)
    {
        session_start();
        $model                    = $this->service->getById($id);
        $model->title             = $request->input('title');
        $model->brand_id          = $request->input('brandId');
        $model->processor_id      = $request->input('processorId');
        $model->video_card_id     = $request->input('videoCardId');
        $model->ram_memory        = $request->input('ramMemory');
        $model->memory            = $request->input('memory');
        $model->diagonal          = $request->input('diagonal');
        $model->screen_resolution = $request->input('screenResolution');
        $model->quantity          = $request->input('quantity');
        $model->price             = $request->input('price');

        $destinationPath = 'public/images/products';
        $image           = $request->file('image');
        $imageName       = $image->getClientOriginalName();
        $path            = $request->file('image')->storeAs($destinationPath, $imageName);
        $model->image    = $imageName;

        $this->repository->update($model);

        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $laptops = $this->service->getAll($request);
        $brands     = Brand::all();
        return view('laptop.index', [
            'brands' => $brands,
            'laptops' => $laptops
        ]);
    }

    public function destroy(int $id)
    {
        session_start();
        $this->repository->delete($id);
        $_SESSION['success'] = 'Успешно';
        return redirect()->back();
    }

    public function show(int $id)
    {
        $laptop     = $this->service->getById($id);
        $brands     = Brand::all();
        $processors = Processor::all();
        $videoCards = VideoCard::all();
        return view('laptop.show', [
            'brands' => $brands,
            'processors' => $processors,
            'videoCards' => $videoCards,
            'laptop' => $laptop
        ]);
    }

    public function more(int $id)
    {
        $laptop     = $this->service->getById($id);
        return view('laptop.more', [
            'laptop' => $laptop
        ]);
    }
    public function storePage()
    {
        $brands     = Brand::all();
        $processors = Processor::all();
        $videoCards = VideoCard::all();
        return view('laptop.store', [
            'brands' => $brands,
            'processors' => $processors,
            'videoCards' => $videoCards
        ]);
    }
}
