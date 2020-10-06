{{-- Extender o layout principal --}}
@extends('admin.layouts.principal')

{{-- Section para o titulo --}}
@section('titulo','Produtos')

{{-- Section para a acao --}}
@section('acao', 'Listar')

{{-- Section Principal --}}
@section('conteudo-principal') {{-- Tem que colocar o nome do yeild onde quero jogar o conteudo  --}}
<section class="section">
    <table class="highlight">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Situação</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->quantidade}}</td>
                    <td>
                        <label>
                            <input type="checkbox" disabled="disabled" class="filled-in"
                            @if ($produto->ativo)
                                checked="checked"
                            @endif
                            />
                            <span>Ativo</span>
                        </label>
                    </td>
                    <td class="right-align">
                        <span class="btn btn-info btn-sm" title="Editar">
                            <i class="fas fa-edit fa-fw"></i>
                        </span>
                        <button class="btn btn-danger btn-sm ml-1" title="Excluir">
                            <i class="far fa-trash-alt fa-fw"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Não há itens para visualizar</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.produtos.form_adicionar')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>
@endsection
