<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use AdminTrait;
    
    private $hasType = false;
    private $text = 'book';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $data = Book::all();
        return view('admin.show')->with('data',$data)
                                ->with('hasType',$this->hasType)
                                ->with('text',$this->text);
    }

    public function create()
    {
        return view('admin.create')
                                   ->with('hasType',$this->hasType)
                                   ->with('text',$this->text);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:books,name|max:255'
        ]);

        $book = new Book;
        $this->saveData($book,$request);
        return redirect('admin/book');
    }

    public function edit( Book $book )
    {
        $item = $book;
        return view('admin.edit')->with('item',$item)
                                ->with('hasType',$this->hasType)
                                ->with('text',$this->text);;
    }

    public function update(Request $request, Book $book )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $this->saveData($book,$request);
        
        return redirect('admin/book');
    }

    public function destroy( Book $book )
    {
        $book->delete();
        return redirect('/admin/book');
    }
}
