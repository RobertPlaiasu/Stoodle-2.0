<?php

namespace App\Http\Controllers;

use App\Region;
use App\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        $data = County::all();
        $text = 'county';
        $hasType = true;
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = Region::all();
        $text = 'county';
        $hasType = true;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request,County $county)
    {
        $request->validate([
            'name' => 'required|unique:counties,name|max:255',
            'type' => 'required|exists:regions,id'
        ]);

        $county->name = $request->name;
        $county->timestamps = false;
        $county->save();
        $county->region()->attach( $request->type );
        $county->save();
        
        return redirect('admin/county');
    }

    public function edit( County $county )
    {
        $data = Region::all();
        $item = $county;
        $text = 'county';
        $hasType = true;
        $typeSelected = $county->region()->pluck('region_id')->toArray();
        return view('admin.edit', compact( 'item', 'text','hasType','data','typeSelected'));
    }

    public function update(Request $request,County $county)
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:regions,id'
        ]);
        $county->name = $request->name;
        $county->timestamps = false;
        $county->save();
        $county->region()->sync($request->type);
        $county->save();

        return redirect('admin/county');
    }

    public function destroy( County $county )
    {
        $county->delete();
        return redirect('/admin/county');
    }
}
