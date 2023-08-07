<?php

declare(strict_types=1);


namespace App\Module\Orders\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Module\Laptops\Models\Laptop;

final class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function addToCart(int $id)
    {
        session_start();
        $product = Laptop::findOrFail($id);

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "title" => $product->brand->title . ' ' . $product->title . ' ' . $product->diagonal,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        $_SESSION['cart']    = $cart;
        $_SESSION['success'] = 'Успешно добавлено';
        return redirect()->back();
    }

    public function destroy()
    {
        session_start();
        unset($_SESSION['cart']);
        return redirect()->back();
    }

    public function remove(int $id)
    {
        session_start();
        if ($_SESSION['cart'][$id]['quantity'] > 1) {
            $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] - 1;
        } else {
            unset($_SESSION['cart'][$id]);
        }
        return redirect()->back();
    }
}
