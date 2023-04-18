<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // método responável por exibir o formulario de login 
    public function create(){

        return view('register');
    }

    // método responsável por fazer login do usuário
    public function auth(Request $request){

        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ],[
            'email.required' => 'Email é obrigatório!',
            'email.email'    => 'Insira um tipo de email válido!',
            'password'       => 'Senha é obrigatória!'
        ]);

        if(Auth::attempt($credenciais)){
        
            // verificando se é ADMIN
            if($credenciais['email'] == 'admin@gmail.com'){
            
                $request->session()->regenerate(); // cria um id da sessão
                return redirect()->route('admin.index');
            }

            $request->session()->regenerate(); // cria um id da sessão
            return redirect()->intended('/home');
        
        }else{
            
            return redirect()->back()->with('msg-danger', 'Dados Inválidos!');
        }
    }


    // método responsável por fazer logout do usuário 
    public function logout(Request $request){
        
        Auth::logout(); // desloga

        $request->session()->invalidate();          // invalida requisicao
        $request->session()->regenerateToken();     // gera um novo token

        return redirect('/'); 

    }
        
}
