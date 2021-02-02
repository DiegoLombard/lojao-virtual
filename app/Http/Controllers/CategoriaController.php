<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        $categorias = Categoria::paginate(5);
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
        Categoria::create($dados);
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produto::all();
        $categoria=Categoria::find($id);
        return view('categorias.show', compact('categoria','produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::find($id);
        return view('categorias.edit', compact('categoria'));
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
        $categoria = Categoria::find($id);
        
        $categoria->update($dados);
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.delete', compact('categoria'));
    }
   
        public function destroy($id)
    {
    if(DB::table('categoria_produto')->
        where('categoria_id', $id)->count()){
        $msg = "Não é possível excluir esta categoria.
        Os produtos com id ( ";
        $produtos = DB::table('categoria_produto')->
            where('categoria_id', $id)->get();
            foreach($produtos as $produto){
            $msg .= $produto->produto_id." ";
        }
        $msg .= " ) estão relacionados com esta categoria";
            \Session::flash('mensagem', ['msg'=>$msg]);
            return redirect()->route('categorias.remove', $id);
    }

    }
    public function buscar(Request $request)
    {
        $categorias = Categoria::where('nome','LIKE', "%{$request->buscar}%")->paginate();
        return view('categorias.index', compact('categorias'));

    } 
}
