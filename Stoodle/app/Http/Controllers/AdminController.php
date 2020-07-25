<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }
    
    public function index()
    {
        $panels = [ 
            [
                "link" => "passion",
                "text" => "pasiuni" 
            ],
            [ 
                "link" => "passionType",
                "text" => "tipuri de pasiuni" 
            ],
            [ 
                "link" => "profil",
                "text" => "profiluri" 
            ],
            [ 
                "link" => "profilType",
                "text" => "tipuri de profil" 
            ],
            [ 
                "link" => "subject",
                "text" => "subiecte" 
            ],
            [ 
                "link" => "subjectType",
                "text" => "tipuri de subiecte" 
            ],
            [ 
                "link" => "book",
                "text" => "carti" 
            ],
            [ 
                "link" => "county",
                "text" => "judete" 
            ],
            [ 
                "link" => "region",
                "text" => "regiuni" 
            ],
        ];

        return view('admin.index', compact('panels'));
     }
}
