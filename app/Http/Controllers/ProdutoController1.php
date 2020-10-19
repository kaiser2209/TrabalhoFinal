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
        $action = route('admin.produtos.adicionar');
        return view('admin.produtos.form', compact('action'));
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

    public function deletar($id, Request $request) {
        Produto::destroy($id);

        $request->session()->flash('sucesso', "Registro excluído com sucesso!");

        return redirect()->route('admin.produtos.listar');
    }

    public function formEditar($id) {
        $produto = Produto::find($id);
        $action = route('admin.produtos.editar', $produto->id);
        return view('admin.produtos.form', compact('produto', 'action'));
    }

    public function editar(ProdutoRequest $request, $id) {
        $produto = Produto::find($id);
        /*
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->quantidade = $request->quantidade;
        $produto->ativo = $request->has('ativo');
        $produto->save();
        */
        $produto->update($request->all());

        $request->session()->flash('sucesso', "Registro alterado com sucesso!");
        return redirect()->route('admin.produtos.listar');
    }
}
