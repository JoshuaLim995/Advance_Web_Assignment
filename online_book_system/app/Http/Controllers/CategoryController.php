<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
     {
        $this->authorize('view', Category::class);

        return view('categories.index');
    }

    public function apiIndex()
    {
    	$categories = Category::orderBy('name', 'asc')->get();

    	return $categories;
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        $category = new Category();

        return view('categories.create', [
          'category' => $category,
          ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
            'required', 
            'unique:categories',
            'max:100',
            ],
            ]);

        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('category.index');
    }

    public function show($id)
    {
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        $this->authorize('view', $category);

        $books = $category->books()->orderBy('title', 'asc')->get();

        return view('categories.show', [
            'category' => $category,
            'books' => $books,
            ]);
    }

    public function apiShow($id)
    {
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;
        $books = $category->books()->orderBy('title', 'asc')->get();

        if($category) {
            return $category;
        }
        else {
            return response()->json(null);
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        $this->authorize('manage', $category);
        
        return view('categories.edit', [
            'category' => $category
            ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;
        
        $category->fill($request->all());
        $category->save();
        return redirect()->route('category.index');
    }
    
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category) throw new ModelNotFoundException;

        $this->authorize('manage', $category);
        $category->delete();

        return redirect()->route('category.index');
    }
}
