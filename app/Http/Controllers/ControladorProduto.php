<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produto;
use App\Categoria;
class ControladorProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $prods=Produto::all();
        foreach($prods as $prod){
            
            $cat=Categoria::find($prod->categoria_id);
            $produtos[]=array("id" => $prod->id, "nome" => $prod->nome, "estoque" => $prod->estoque, "preco" => $prod->preco, "categoria" => $cat->nome);
            
        }
        
        return view('produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $cats=Categoria::all();
       return view('novoproduto',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod= new Produto();
        $prod->nome= $request->input('nomeProduto');
        $prod->estoque= $request->input('estoqueProduto');
        $prod->preco= $request->input('precoProduto');
        $prod->categoria_id= $request->input('categoria_id');
        $prod->save();
        return redirect('/produtos');
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
        
        
        $prod= Produto::find($id);
        $cats= Categoria::all();
        if(isset($prod)){
            $cat=Categoria::find($prod->categoria_id);
            $produtos=array("id" => $prod->id, "nome" => $prod->nome, "estoque" => $prod->estoque, "preco" => $prod->preco, "categoria" => $cat->nome, "categoria_id" => $cat->id);
            return view('editarproduto',compact('produtos', 'cats'));   
        }else{
            return redirect('/produtos');    
        }
        
        
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
        $prod= Produto::find($id);
        if(isset($prod)){
        $prod->nome=$request->input('nomeProduto');
        $prod->estoque=$request->input('estoqueProduto');
        $prod->preco=$request->input('precoProduto');
        $prod->categoria_id=$request->input('categoria_id');
        $prod->save();
        }
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod= Produto::find($id);
        if(isset($prod)){
            $prod->delete();
        }
        return redirect('/produtos');
    }
}
