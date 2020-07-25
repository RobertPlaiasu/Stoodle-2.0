<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use Illuminate\Http\Request;
use App\CustomClass\PanelText;

class BookController extends Controller
{
    use AdminTrait;
    
    private $hasType;
    private $text;

    public function __construct()
    {
        $this->hasType = false;
        $this->text = new PanelText( 'Carti', 'carte', 'book' );
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')
            ->with('data', Book::all())
            ->with('hasType', $this->hasType)
            ->with('text', $this->text);
    }

    public function create()
    {
        return view('admin.create')
            ->with('hasType', $this->hasType)
            ->with('text', $this->text);
    }

    public function store( Request $request )
    {
        $request->validate([
            'nume' => 'required|unique:books,name|max:255'
        ]);

        $book = new Book;
        $this->saveData( $book, $request );
        return redirect('admin/book');
    }

    public function edit( Book $book )
    {
        $item = $book;
        return view('admin.edit')
            ->with('item',$item)
            ->with('hasType', $this->hasType)
            ->with('text', $this->text);
    }

    public function update( Request $request, Book $book )
    {
        $request->validate([
            'nume' => 'required|max:255'
        ]);
        
        $this->saveData($book, $request);
        
        return redirect('admin/book');
    }

    public function destroy( Book $book )
    {
        $book->delete();
        return redirect('/admin/book');
    }
}
