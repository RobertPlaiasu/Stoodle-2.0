<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    use AdminTrait;

    private $text = 'region';
    private $hasType = false;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);    
    }

    public function index()
    {
        return view('admin.show')->with('data',Region::all())
                                ->with('text',$this->text);;
    }

    public function create()
    {
        return view('admin.create')->with('data',Region::all())
                                    ->with('text',$this->text)
                                    ->with('hasType',$this->hasType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:regions,type|max:255'
        ]);

        $region = new Region;
        $this->saveType($region,$request);
        
        return redirect('admin/region');
    }

    public function edit(Region $region )
    {
        return view('admin.edit')->with('item',$region)
                                ->with('text',$this->text)
                                ->with('hasType',$this->hasType);
    }

    public function update(Request $request, Region $region )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $this->saveType($region,$request);
        
        return redirect('admin/region');
    }

    public function destroy( Region $region )
    {
        $region->delete();
        return redirect()->back();

    }
}
