<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
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
        $goods = Product::query()->orderBy('article', 'ASC')->get();
        return view('pages.goods.goods-list', ['goods' => $goods]);
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
        $product = Product::create([
            'article' => $data['article'],
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);
        if (isset($data['imgs'])) {
            foreach ($data['imgs'] as $key => $img) {
                $currentImgs = Image::where('product_id', $product->id)->count();
                if($currentImgs > 6) continue;

                $name = $product->article . '_' . $key . '.' . $img->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $img, $name);
                Image::create([
                    'product_id' => $product->id,
                    'img' => $filePath,
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
        $product = Product::find($id);
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return view('pages.goods.edit-product', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $product = Product::where('id', $id)->update([
            'article' => $data['article'],
            'title' => $data['title'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);
        if (isset($data['imgs'])) {
            foreach ($data['imgs'] as $key => $img) {
                $currentImgs = Image::where('product_id', $product->id)->count();
                if($currentImgs > 6) continue;

                $name = $product->article . '_' . $key . '.' . $img->getClientOriginalExtension();
                $filePath = Storage::disk('public')->putFileAs('/images', $img, $name);
                Image::create([
                    'product_id' => $product->id,
                    'img' => $filePath,
                ]);
            }
            unset($data['imgs']);
        }
        return back()->with('status', 'product-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return back();
    }

    public function updatePublished(Request $request, string $id)
    {
        $request->validate([
            'is_published' => ['required', 'string'],
        ]);
        Product::where('id', $id)->update(['is_published' => $request->is_published]);
        return back();
    }

    public function updatePrice(Request $request, string $id)
    {
        $request->validate([
            'price' => ['required', 'numeric', 'between:0.00,99999.99'],
        ]);
        Product::where('id', $id)->update(['price' => $request->price]);
        return back();
    }

    public function updateCount(Request $request, string $id)
    {
        $request->validate([
            'count' => ['required', 'numeric', 'between:0,9999999'],
        ]);
        Product::where('id', $id)->update(['count' => $request->count]);
        return back();
    }
}
