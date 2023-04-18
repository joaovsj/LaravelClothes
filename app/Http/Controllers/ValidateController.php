<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateController extends Controller
{
    

    public static function verifyCount($array = []){
        
        foreach ($array as $key => $value) {
            
            if($value === null){
                
                return false; 
            }

        }

        return true;
    }


}
