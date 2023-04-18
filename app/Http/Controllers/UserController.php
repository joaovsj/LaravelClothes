<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Show the form of authentication 
     * @return \Illuminate\Http\Response
     */
    public function login(){
        
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = $request->all();

        // verificando se os dados foram enviados
        if(ValidateController::verifyCount($user) === false){

            return redirect()->back()->with('msg-danger', 'Preencha todos os campos!');
        }

        // verificando se senha é valida
        if($user['password'] != $user['confirmPassword']){

            return redirect()->back()->with('msg-danger', 'Senhas não conferem!');
        }

        // cadastrando 
        $user['password'] = bcrypt($request->password);
        User::create($user);

        return redirect()->back()->with('msg', 'Usuário Cadastrado com Sucesso!');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
