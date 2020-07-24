<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UniversityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin'])->except('show');  
        $this->middleware( [ 'auth', 'verified', 'checkForm' ])->only('show');  
    }

    public function index()
    {
        $data = University::all();
        $text = 'university';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        return view('university.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:universities,name',
            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:1999',
            'url' => 'required|url|max:255',
            'description' => 'required|min:200|max:30000',
        ]); 

        $university = new University;
        $university->name = $request->name;
        $university->description = $request->description;
        $university->url = $request->url;
        $university->ifFileExists( $request, $university);
        $university->save();
        
        return redirect('/university');
    }

    public function show( University $university )
    {
        return view('university.show', compact( 'university' ));
    }

    public function edit( University $university )
    {
        return view('university.edit', compact( 'university' ));
    }

    public function update( Request $request, University $university )
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:1999',
            'url' => 'required|url|max:255',
            'description' => 'required|min:200|max:30000',
        ]); 
            
        $university->name = $request->name;
        $university->description = $request->description;
        $university->url = $request->url;
        $university->ifFileExists( $request, $university);
        $university->save();
        
        return redirect('university/'. $university->id );
    }

    public function destroy( University $university )
    {
        $university->delete();
        return redirect('/university');
    }

    private function ifFileExists( $request, $university ) :void
    {
        if($request->hasFile('image'))
        {
            $university->image = $request->image->store('images','public');

            $image = Image::make(public_path('storage/'.$university->image))->fit(300,300);
            $image->save();
        }
    }
}
