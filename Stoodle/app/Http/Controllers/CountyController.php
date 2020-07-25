<?php

namespace App\Http\Controllers;

use App\Region;
use App\County;
use Illuminate\Http\Request;
use App\CustomClass\PanelText;

class CountyController extends Controller
{
    use AdminTrait;

    private $hasType;
    private $text;

    public function __construct()
    {
        $this->hasType = true;
        $this->text = new PanelText( 'judete', 'judet', 'county' );
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')
            ->with('data', County::all())
            ->with('text', $this->text);
    }

    public function create()
    {
        return view('admin.create')
            ->with('data', Region::all())
            ->with('text', $this->text)
            ->with('hasType', $this->hasType);
    }

    public function store( Request $request, County $county )
    {
        $request->validate([
            'nume' => 'required|unique:counties,name|max:255',
            'tip' => 'required|exists:regions,id'
        ]);

        $this->saveCounty( $county, $request );
        
        return redirect('admin/county');
    }

    public function edit( County $county )
    {
        return view('admin.edit')
            ->with('typeSelected',$county->region()->pluck('region_id')->toArray())
            ->with('item', $county)
            ->with('data', Region::all())
            ->with('hasType', $this->hasType)
            ->with('text', $this->text);
    }

    public function update( Request $request, County $county )
    {
        $request->validate([
            'nume' => 'required|max:255',
            'tip' => 'required|exists:regions,id'
        ]);
        
        $this->saveCounty( $county, $request );

        return redirect( 'admin/county' );
    }

    public function destroy( County $county )
    {
        $county->delete();
        return redirect( '/admin/county' );
    }

    private function saveCounty( $county, $request )
    {
        $this->saveData( $county, $request );
        $county->region()->sync( $request->type );
        $county->save();
    }
}
