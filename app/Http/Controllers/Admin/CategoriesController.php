<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $category->image_path = $file->store('uploads', 'public');
        }
        
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

        $old_image = $category->image_path;

        $category->name = $request->input('name');
        $category->slug = Str::slug( $request->input('name') );
        $category->description = $request->post('description');
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $category->image_path = $file->store('uploads', 'public');
        }

        $category->save();

        if ($old_image && $old_image != $category->image_path) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated!');
    }

    public function destroy($id)
    {
        //Category::destroy($id);
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image_path) {
            Storage::disk('public')->delete($category->image_path);
        }

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted!');
    }
}
