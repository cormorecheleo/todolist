<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UpperCaseController extends Controller
{
    
    public function index(string $value){
        return $value;
    }

    public function usesession(){
        Session::put('name', 'fred');
        return view('uppercase.usesession');
    }

}
