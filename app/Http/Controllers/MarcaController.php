<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;

class MarcaController extends Controller
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
        $marcas = Marca::paginate(5);
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
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
        Marca::create($dados);
        return redirect()->route('marcas.index');
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
        $marca=Marca::find($id);
        return view('marcas.show', compact('marca', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca=Marca::find($id);
        return view('marcas.edit', compact('marca'));
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
        $marca = Marca::find($id);
        
        $marca->update($dados);
        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $marca = Marca::find($id);
        return view('marcas.delete', compact('marca'));
    }
    public function destroy($id)
    {
        if(Produto::where('marca_id', '=',$id)->count()){
            $msg = "Não é possível excluir esta marca. O(s) produto(s): ";
            $produtos = Produto::where('marca_id', '=', $id)->get();
            foreach($produtos as $produto){
                $msg.=" -". $produto->descricao." ";
            }
            $msg .= " está(ão) relacionados com esta marca.";
            \Session::flash('mensagem', ['msg' =>$msg]);
            return redirect()->route('marcas.delete', $id);}
    }
    public function buscar(Request $request)
    {
        $marcas = Marca::where('nome','LIKE', "%{$request->buscar}%")->paginate();
        return view('marcas.index', compact('marcas'));

    }
}

