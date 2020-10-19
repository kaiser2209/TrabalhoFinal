<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = 'Trabalho Programação WEB II';
        $subtitulo = 'Lista de Produtos';
        //$produtos = ["AMD Ryzen", "Notebook Acer"];

        //$produtos = Produto::all(); Lazy Load
        $produtos = Produto::with(['categoria'])->get();
        //dd($produtos);

        return view('admin.produtos.index', compact('titulo', 'subtitulo', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $action = route('admin.produtos.store');
        return view('admin.produtos.form', compact('action', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        Produto::create($request->all()); //Inserção de todos os dados presentes no form (Atribuição em massa)

        $request->session()->flash('sucesso', "Registro salvo com sucesso!");

        return redirect()->route('admin.produtos.index');
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
        $categorias = Categoria::all();
        $produto = Produto::find($id);
        $action = route('admin.produtos.update', $produto->id);
        return view('admin.produtos.form', compact('produto', 'categorias', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $produto = Produto::find($id);

        $produto->update($request->all());

        $request->session()->flash('sucesso', "Registro alterado com sucesso!");
        return redirect()->route('admin.produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        Produto::destroy($id);

        $request->session()->flash('sucesso', "Registro excluído com sucesso!");

        return redirect()->route('admin.produtos.index');
    }
}
