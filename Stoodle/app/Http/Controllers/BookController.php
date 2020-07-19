<?php

namespace App\Http\Controllers;

use App\book;
use App\User;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }

    public function index()
    {
        $data = book::all();
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

    public function edit( $id )
    {
        $item = book::findOrFail( $id );
        $text = 'book';
        return view('admin.edit', compact( 'item', 'text' ));
    }

    public function update(Request $request,$id )
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        $item = book::findOrFail( $id ); 
        $item->name = $request->name;
        $item->timestamps = false;
        $item->save();
        
        return redirect('admin/book/');
    }

    public function destroy( $id )
    {
        $item = book::findOrFail( $id ); 
        $item->delete();
        return redirect('/admin/book');
    }
}
