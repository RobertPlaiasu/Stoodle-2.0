<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin', 'checkForm']);
    }
    
    public function index()
    {
        $text = ['passion', 'passionType', 'profil', 'profilType', 'subject', 'subjectType', 'book', 'university'];
        return view('admin.index', compact('text'));
    }
}
