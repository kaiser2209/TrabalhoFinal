<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function itens() {
        $titulo = 'Trabalho Programação WEB II';
        $subtitulo = 'Lista de Produtos';
        //$produtos = ["AMD Ryzen", "Notebook Acer"];

        $produtos = Produto::all();
        //dd($produtos);

        return view('admin.produtos.index', compact('titulo', 'subtitulo', 'produtos'));
    }

    public function formAdicionar() {
        return view('admin.produtos.form');
    }

    public function adicionar(ProdutoRequest $request) {
        //Validar dados
        /*
        $request->validate([
            'nome' => 'bail|required|min:3|max:100|unique:produtos',
            'descricao' => 'max:255'
        ]);
        */
        //Pegando o dado enviado pelo form
        //$nome = $request->input('nome');

        //Criar um objeto do modelo (classe) Produto
        //Inlcusão dos dados através de um objeto e atribuindo os valores um por um
/*
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->ativo = $request->has('ativo');



        $produto->save(); //salvar no banco de dados
*/
        Produto::create($request->all()); //Inserção de todos os dados presentes no form (Atribuição em massa)

        $request->session()->flash('sucesso', "Registro salvo com sucesso!");

        return redirect()->route('admin.produtos.listar');
    }
}
