<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', Book::class);

        return view('books.index');
    }

    public function apiIndex()
    {
    	$books = Book::all();

    	return $books;
    }

    public function create()
    {
        $this->authorize('create', Book::class);

        $book = new Book();

        return view('books.create', [
          'book' => $book,
          ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => [
            'required', 
            'unique:books',
            'max:100',
            ],
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'edition' => 'required|max:50',
            'edition_year' => [
            'required',
            'max:4',
            'regex:/^([0-9]{4})$/',
            ],
            ]);


        $book = new Book();
        $book->fill($request->all());
        $book->save();

        $book->categories()->sync($request->categories, true);

        return redirect()->route('book.index');
    }

    public function show($id)
    {
        $book = Book::find($id);
        if(!$book) throw new ModelNotFoundException;

         $this->authorize('view', $book);

        return view('books.show', [
            'book' => $book
            ]);
    }

    public function apiShow($id)
    {
        $book = Book::find($id);

        if($book) {
            return $book;
        }
        else {
            return response()->json(null);
        }
    }

    public function edit($id)
    {
        $book = Book::find($id);
        if(!$book) throw new ModelNotFoundException;

        $this->authorize('manage', $book);
        
        return view('books.edit', [
            'book' => $book
            ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'isbn' => [
            'required', 
            'max:100',
            ],
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'edition' => 'required|max:50',
            'edition_year' => [
            'required',
            'max:4',
            'regex:/^([0-9]{4})$/',
            ],
            ]);

        $book = Book::find($id);
        if(!$book) throw new ModelNotFoundException;
        
        $book->fill($request->all());
        $book->categories()->sync($request->categories, true);
        $book->save();
        return redirect()->route('book.index');
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if(!$book) throw new ModelNotFoundException;
        $this->authorize('manage', $book);
        $book->delete();

        return redirect()->route('book.index');
    }
}
