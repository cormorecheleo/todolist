<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpperCaseController extends Controller
{
    
    public function index(string $value){
        return $value;
    }

}
