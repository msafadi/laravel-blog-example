<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    // Actions Methods
    public function index()
    {
        $categories = Category::all();

        $success = session('success');

        return view('admin.categories.index', [
            'categories' => $categories,
            'success' => $success,
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'category' => new Category()
        ]);
    }

    public function store(Request $request)
    {
        // Name: Political News
        // Slug: political-news
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug( $request->input('name') );
        $category->description = $request->post('description');
        $category->status = $request->status;
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category added!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->input('name');
        $category->slug = Str::slug( $request->input('name') );
        $category->description = $request->post('description');
        $category->status = $request->status;
        $category->save();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated!');
    }

    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted!');
    }
}
