<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateCategoryStore;
use App\Http\Requests\ValidateCategoryUpdate;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.category-create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateCategoryStore $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->user_id = $request->user_id;
        $category->save();

        return redirect()->route('category.index')->with('input_success','Success add category data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $user = User::all();
        return view('admin.category-edit', compact('user', 'category',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateCategoryUpdate $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('category.index')->with('update_success', 'Success update category data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
