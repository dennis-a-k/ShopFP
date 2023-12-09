<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.goods.add-product', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        if (isset($data['imgs'])) {
            foreach ($data['imgs'] as $key => $img) {
                $name = $product->article . '_' . $key . '.' . $img->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $img, $name);
                Image::create([
                    'product_id' => $product->id,
                    'img' => $filePath,
                    'url' => url('/storage/' . $filePath),
                ]);
            }
            unset($data['imgs']);
        }
        return back()->with('status', 'product-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
