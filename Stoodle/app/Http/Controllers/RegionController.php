<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);    
    }

    public function index()
    {
        $data = Region::all();
        $text = 'region';
        return view('admin.show', compact( 'data', 'text' ));
    }

    public function create()
    {
        $data = Region::all();
        $text = 'region';
        $hasType = false;
        return view('admin.create', compact( 'data', 'text', 'hasType' ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:regions,type|max:255'
        ]);

        $region = new Region;
        $region->type = $request->name;
        $region->timestamps = false;
        $region->save();
        
        return redirect()->back();
    }

    public function edit(Region $region )
    {
        $item = $region;
        $text = 'region';
        $hasType = false;
        return view('admin.edit', compact( 'item', 'text','hasType'));
    }

    public function update(Request $request, Region $region )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $region->type = $request->name;
        $region->timestamps = false;
        $region->save();
        
        return redirect('admin/region');
    }

    public function destroy( Region $region )
    {
        $region->delete();
        return redirect()->back();

    }
}
