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
            'name' => 'required',
            'type' => 'required'
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
        return view('admin.edit', compact( 'item', 'text','hasType','data'));
    }

    public function update(Request $request,County $county)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);
        $county->name = $request->name;
        $county->timestamps = false;
        $county->save();
        $county->region()->sync($request->type);
        $county->save();

        return redirect('admin/county/');
    }

    public function destroy( County $county )
    {
        $county->delete();
        return redirect('/admin/county');
    }
}
