<?php

namespace App\Http\Controllers;

use App\Passion;
use App\PassionType;
use App\User;
use Illuminate\Http\Request;

class PassionController extends Controller
{
    use AdminTrait;

    private $hasType = true;
    private $text = 'passion';

    public function __construct()
    {

        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')->with('text',$this->text)
                                 ->with('data',Passion::all());
    }

    public function create()
    {
        return view('admin.create')->with('data',PassionType::all())
                                   ->with('text',$this->text)
                                   ->with('hasType',$this->hasType);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:passions,name|max:255',
            'type' => 'required|exists:passion_types,id'
        ]);

        $passion = new Passion;
        $this->savePassion($passion,$request);
        
        return redirect('admin/passion');
    }

    public function edit( Passion $passion )
    {
        return view('admin.edit')->with('typeSelected',$passion->passionType()->pluck('passion_type_id')->toArray())
                                 ->with('item',$passion)
                                 ->with('data',PassionType::all())
                                 ->with('hasType',$this->hasType)
                                 ->with('text',$this->text);
    }

    public function update(Request $request, Passion $passion )
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required|exists:passion_types,id'
        ]);
        
        $this->savePassion($passion,$request);

        return redirect('admin/passion');
    }

    public function destroy( Passion $passion )
    {
        $passion->delete();
        return redirect('/admin/passion');
    }

    private function savePassion($passion,$request)
    {
        $this->saveData($passion,$request);
        $passion->passionType()->sync($request->type);
        $passion->save();
    }
}
