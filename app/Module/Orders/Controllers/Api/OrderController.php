<?php

declare(strict_types=1);


namespace App\Module\Orders\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Laptops\Models\Laptop;
use App\Module\Orders\Models\Order;
use App\Module\Orders\Models\OrderItem;
use App\Module\Orders\Repositories\Contracts\OrderItemRepositoryInterface;
use App\Module\Orders\Repositories\Contracts\OrderRepositoryInterface;
use App\Module\Orders\Request\CreateOrderRequest;
use App\Module\Orders\Services\Contracts\OrderItemServiceInterface;
use App\Module\Orders\Services\Contracts\OrderServiceInterface;

final class OrderController extends Controller
{
    public function __construct(
        private OrderServiceInterface $service,
        private OrderRepositoryInterface $repository,
        private OrderItemRepositoryInterface $itemRepository,
        private OrderItemServiceInterface $itemService,
    ) {
    }

    public function store(CreateOrderRequest $request)
    {
        session_start();
        $order              = new Order();
        $order->user_id     = (int)$request->input('userId');
        $order->total_price = (int)$request->input('totalPrice');
        $this->repository->create($order);

        $laptop    = $request->input('laptop');
        foreach ($laptop as $value) {
            $orderItem = new OrderItem();
            $orderItem->order_id   = $order->id;
            $orderItem->laptop_id  = (int)$value['id'];
            $orderItem->quantity   = (int)$value['quantity'];
            $orderItem->unit_price = (int)$value['unitPrice'];
            $this->itemRepository->create($orderItem);

            $laptop = Laptop::find((int)$value['id']);
            $laptop->quantity -= (int)$value['quantity'];
            $laptop->updateOrFail();
        }

        $_SESSION['success'] = 'Успешно';
        unset($_SESSION['cart']);
        return redirect()->back();
    }

    public function index()
    {
        $orders = $this->service->getAll();
        return view('order.index', ['orders'=>$orders]);
    }

    public function show(int $id)
    {
        $order = $this->service->getById($id);
        return view('order.show', ['order' => $order]);
    }

    public function destroy(int $id)
    {
        session_start();
        $this->repository->destroy($id);

        $_SESSION['success'] = 'Успешно';
        return redirect()->route('order.index');
    }
}
