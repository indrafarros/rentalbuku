<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create($request->all());

        return redirect('/categories')->with('status', 'Category add successfully');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('category-edit', ['category' => $category]);
    }

    public function update(Request $request, $slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories,slug,' . $request->slug
        ]);
        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());

        return redirect('/categories')->with('status', 'Category update successfully');
    }

    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('category-delete', ['category' => $category]);
    }

    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/categories')->with('status', 'Category delete successfully');
    }

    public function deleted()
    {
        $categories = Category::onlyTrashed()->get();
        return view('category-deleted', ['categories' => $categories]);
    }

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();

        return redirect('/categories')->with('status', 'Category restore successfully');
    }
}
