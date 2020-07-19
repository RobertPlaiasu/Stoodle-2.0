<?php

namespace App\Http\Controllers;

use App\book;
use App\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }

    public function index()
    {
        $data = Book::all();
        $text = 'book';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = NULL;
        $text = 'book';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $book = new book;
        $book->name = $request->name;
        $book->timestamps = false;
        $book->save();
        
        return redirect('admin/book');
    }

    public function edit( Book $book )
    {
        $item = $book;
        $text = 'book';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request, Book $book )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $book->name = $request->name;
        $book->timestamps = false;
        $book->save();
        
        return redirect('admin/book/');
    }

    public function destroy( Book $book )
    {
        $book->delete();
        return redirect('/admin/book');
    }
}
