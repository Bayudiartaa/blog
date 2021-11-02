<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() 
    {
        $categories = Category::all();
        return view('private.category.index', compact('categories'));
    }
    
    public function create() 
    {
        return view('private.category.create');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name.required' => 'Name Wajib Di Isi',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('message', 'Category Berhasil Di Tambah');
    }

    public function edit(Category $category)
    {
        // $this->authorize('update', $post);
        $categories = Category::all();

        return view('private.category.edit', compact('post', 'categories'));
    }

    public function update(Category $category, Request $request) 
    {
        $this->validate($request, [
            'name' => 'required',
        ],[
            'name.required' => 'Name Wajib Di Isi',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('message', 'Category Berhasil Di Udate');
    }
}
