<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index')->with('books',$books);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {

    }
}
