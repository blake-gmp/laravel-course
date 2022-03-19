<?php

namespace App\Http\Controllers;

use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use function response;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index() : View
    {
       // dd(Session::get('cart', new Cart()));
        return view('cart.index', [
                'cart' => Session::get('cart', new Cart())
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function store(Product $product) : JsonResponse
    {
        $cart = Session::get('cart', new Cart());
        Session::put('cart', $cart->addItem($product));
        return response()->json([
           'status' => 'success'
        ]);
    }

    public function destroy(Product $product)
    {
        try {
            $cart = Session::get('cart', new Cart());
            Session::put('cart', $cart->removeItem($product));
            Session::flash('status', __('Produkt został usunięty z koszyka'));

            return response()->json([
                'message' => 'Udało Ci się usunąć produkt.',
                'result' => 'Usunięto!',
                'status' => 'success'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'message' => 'Żadne produkty nie zostały usunięte.',
                'result' => 'Anulowano!',
                'status' => 'error'
            ])->setStatusCode(500);
        }
    }
}
