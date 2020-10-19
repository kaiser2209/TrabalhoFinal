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
                <th>Categoria</th>
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
                    <td>{{$produto->categoria->nome}}</td>
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
                        <a href="{{route('admin.produtos.edit', $produto->id)}}">
                        <span>
                            <i class="material-icons blue-text text-accent-2">edit</i>
                        </span>
                        <form action="{{route('admin.produtos.destroy', $produto->id)}}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button style="border:0; background: transparent;" type="submit">
                                <span style="cursor: pointer;">
                                    <i class="material-icons red-text text-accent-3">delete_forever</i>
                                </span>
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Não há itens para visualizar</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.produtos.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>
@endsection
