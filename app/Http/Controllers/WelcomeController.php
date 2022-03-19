<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request): View|JsonResponse
    {
        $filters = $request->query('filter');
        $query = Product::query();
        if(!is_null($filters)) {
            if(array_key_exists('categories', $filters))
                $query = $query->whereIn('category_id', $filters['categories']);

            if(!is_null($filters['price_min']))
                $query = $query->where('category_id', '>=', $filters['price_min']);

            if(!is_null($filters['price_max']))
                $query = $query->where('category_id', '<=', $filters['price_max']);

            return response()->json([
               'data' => $query->get()
            ]);
        }

        return view('welcome', [
            'products' => Product::paginate(6),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get(),
            'defaultImage' => config('shop.defaultImage'),
            'isGuest' => Auth::guest()
        ]);
    }
}
