<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class registerController extends Controller
{
    //
     public function create(){
   
    return view('register');

   }
    
    
    public function store(Request $request){
        
        $this->validate($request,[
            
            "name"     => "required|string",
            "email"    => "required|email",
            "password" => "required|min:6",
            "address"  => "required|min:10",
            "gender"   => "required",
            "url"      => "required|url",
        ]); 
        
       // dd("Valid Data");
        //dd($request->except(['_token','submit']));
        dd("welcome : " . $request->name);
    }

    
}
