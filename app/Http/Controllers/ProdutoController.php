<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produto::all();
        return view('admin/products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Categoria::all();
        return view('admin/form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!ValidateController::verifyCount($request->all())){
    
            return redirect()->route('admin.create')->with('error_fields', 'Preencha todos os campos!');
        }
    
        $produto = new Produto();
        $produto->titulo = $request->titulo;
        $produto->preco = $request->price;
        $produto->description = $request->description;
        
        $produto->id_category = $request->category; // chave estangeira

        // se tiver imagem e ela for váida
        if($request->hasFile('picture') and $request->file('picture')->isValid()){

            $name = uniqid(); 
            $extension = $request->picture->extension(); 
            $newName = $name.".".$extension;
            $produto->picture = $newName; // definindo novo nome da imagem no banco 

            //salva arquivo com o nome especial
            $upload = $request->picture->storeAs('products', $newName);
        }

        $produto->save();
        return redirect()->route('admin.create')->with('success_products', 'Produto cadastrado com Sucesso!');
    }



    /**
     * Método resonsável por exibir carrinho
     */
    public function cart(){ 
        return view('cart');
    }

    /**
     * Método responsável por adicionar item no carrinho
     */
    public function addToCar($id){
    
        $product = Produto::findOrFail($id);
        
        // retorna array vazio se não existe a sessão, se existe retorna os valores
        $cart = session()->get('cart', []); 
        
        // se esse indice existe no carrinho incrementa a quantidade
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

        }else{

            $value = floatval($product->preco);
            $cart[$id] = [
                "product_name"  => $product->titulo,
                "picture"       => $product->picture,
                "price"         => $value,
                "quantity"      => 1 
            ];
        }
        
        session()->put('cart', $cart); // put-> armazena dados na sessao put(sessao, dados)
        return redirect()->back()->with('msg', 'Produto Adicionado ao carrinho com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Produto::findOrFail($id);
        return view('details', compact('product'));
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
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('msg', 'Seu carrinho foi atualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produto::findOrFail($id);
        unlink(storage_path('app/public/products/'.$product->picture)); // apaga imagem do diretório
        $product = Produto::findOrFail($id)->delete();

        return redirect()->route('admin.listing')->with('sucess', 'Produto excluído com suceso!');    
    
    }

    public function remove(Request $request){
        
        if($request->id){

            $cart = session()->get('cart');
            if(isset($cart[$request->id])){
                
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('msg', 'Produto Excluído com sucesso!');

        }
    }
}
