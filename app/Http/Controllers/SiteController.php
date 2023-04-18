<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Produto;
use \Illuminate\Support\Facades\Str;

class SiteController extends Controller
{
    public function index(){
        
        $titulo = "";

        if(!empty(request('titulo'))){

            $titulo = request('titulo');

            $products = Produto::where([
                ['titulo', 'like', '%'.$titulo.'%'],
            ])->get();
            
            
        } else if(!empty(request('titulo')) or !empty(request('category'))){

            $titulo = request('titulo');
            $category = request('category');

            $products = Produto::where([
                ['titulo', 'like', '%'.$titulo.'%'],
                ['id_category', '=', $category]
            ])->get();
        
        }else if(!empty(request('category'))){

            $products = Produto::where([
                ['id_category', '=', $category]
            ])->get();
            
        } 
        else{

            $products = Produto::all();
        }

        return view('home', compact('products', 'titulo'));
    }
}
