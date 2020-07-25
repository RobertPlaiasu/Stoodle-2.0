<?php

namespace App\Http\Controllers;

use App\SubjectType;
use App\User;
use Illuminate\Http\Request;

class SubjectTypeController extends Controller
{
    use AdminTrait;

    private $text = 'subjectType';
    private $hasType = false;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        return view('admin.show')->with('data',SubjectType::all())
                                  ->with('text',$this->text);

    }

    public function create()
    {
        return view('admin.create')->with('text',$this->text)
                                    ->with('hasType',$this->hasType);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:subject_types,type'
        ]);

        $subjectType = new SubjectType;
        $this->saveType($subjectType,$request);
        
        return redirect('admin/subjectType');
    }

    public function edit( SubjectType $subjectType )
    {
        return view('admin.edit')->with('item',$subjectType)
                                ->with('text',$this->text)
                                ->with('hasType',$this->hasType);
    }

    public function update(Request $request, SubjectType $subjectType )
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $this->saveType($subjectType,$request);
        
        return redirect('admin/subjectType');
    }

    public function destroy( SubjectType $subjectType )
    {
        $subjectType->delete();
        return redirect()->back();

    }
}
