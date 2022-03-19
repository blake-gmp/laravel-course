<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("products.index", [
            'products' => Product::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("products.create", [
            'categories' => ProductCategory::All()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreProductRequest $request)
    {
        $oldImagePath = $request->image_path;
        $product = new Product($request->validated());
        //$product = new Product($request->all());
        if($request->hasFile('image')) {
            if(Storage::exists($oldImagePath))
                Storage::delete($oldImagePath);

            $product->image_path = $request->file('image')->store('products');
        }

        $product->save();
        return redirect(route('products.index'))->with('status', __('products.product.status.stored'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function downloadImage(Product $product): RedirectResponse|StreamedResponse
    {
        if(Storage::exists($product->image_path)) {
            return Storage::download($product->image_path);
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::All()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->fill($request->validated());
        if($request->hasFile('image'))
            $product->image_path = $request->file('image')->store('products');

        $product->save();
        return redirect(route('products.index'))->with('status', __('products.product.status.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            //Session::flash('status', __('products.product.status.delete_success'));
            return response()->json([
                'message' => 'Udało Ci się zmienić dane produktu.',
                'result' => 'Usunięto!',
                'status' => 'success'
            ]);
        } catch(Exception $e) {
            return response()->json([
                'message' => 'Żadne dane nie zostały zmodyfikowane.',
                'result' => 'Anulowano!',
                'status' => 'error'
            ])->setStatusCode(500);
        }
    }
}
