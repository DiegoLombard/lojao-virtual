<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $produtos = Produto::paginate(5);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $marcas = \App\Models\Marca::all();
        return view('produtos.create', compact('marcas', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados =$request->all();
        $produto = Produto::create($dados);
        $produto = Produto::find($produto->id);
        $produto->categorias()->attach($dados['categoria_id']);
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto=Produto::find($id);
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto=Produto::find($id);
        $marcas = \App\Models\Marca::all();
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'marcas','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dados = $request->all();
        $produto = Produto::find($id);
        
        $produto->update($dados);
        $produto->categorias()->sync($dados['categoria_id']);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $produto = Produto::find($id);
        return view('produtos.delete', compact('produto'));
    }
    public function destroy($id)
    {
        $marca = Produto::find($id)->delete();
        return redirect()->route('produtos.index', compact('produto'));
    }
    public function buscar(Request $request)
    {
        $produtos = Produto::where('nome','LIKE', "%{$request->buscar}%")->paginate();
        return view('produtos.index', compact('produtos'));

    }
}
