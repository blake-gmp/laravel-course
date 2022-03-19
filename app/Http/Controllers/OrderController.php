<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\ValueObjects\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use \Illuminate\Support\Facades;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view("orders.index", [
            'orders' => Order::where('user_id', Facades\Auth::id())->paginate(7)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(): RedirectResponse
    {
        $cart = Session::get('cart', new Cart());
        if($cart->hasItems()) {
            $order = new Order();
            $order->quantity = $cart->getSum();
            $order->price = $cart->getSum();
            $order->user_id = Facades\Auth::id();
            $order->save();

            $productIds = $cart->getItems()->map(function ($item) {
                return ['product_id' => $item->getProductId()];
            });

            $order->products()->attach($productIds);

            Session::put('cart', new Cart());
            return redirect(route('orders.index'))->with('status', __('Zamówienie zrealizowane.'));
        }
        return back();
    }
}
