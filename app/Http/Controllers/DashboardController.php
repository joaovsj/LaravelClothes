<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Produto;
use \App\Models\Categoria;
use \DB;

class DashboardController extends Controller
{
    public function index(){
        
        $totalDeUsuarios = User::all()->count();
        $totalDeUsuarios = $totalDeUsuarios - 1; 

        $users = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as totalUsers')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        foreach ($users as $user) {
            $ano[] = $user->ano;
            $total[] = $user->totalUsers;
        }

        $usuariosAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        $categories = Categoria::all();
        foreach ($categories as $value) {
            $newCategories[] = "'".$value->name."'";
            $countProducts[] = Produto::where('id_category', $value->id)->count();
        }

        $category = implode(',', $newCategories);
        $product = implode(',', $countProducts);

        return view('admin/panel', compact('category', 'product', 'usuariosAno', 'userTotal', 'totalDeUsuarios'));
    }
}
