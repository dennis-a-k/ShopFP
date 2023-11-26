<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return view('pages.categories.categories-list', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();
        Category::create(['title' => $request->title]);
        return back()->with('status', 'category-created');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request)
    {
        $request->validated();
        Category::where('id', $request->id)->update(['title' => $request->title]);
        return back()->with('status', 'category-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
