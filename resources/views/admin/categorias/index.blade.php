@extends('admin.layouts.principal')

@section('titulo', 'Categorias')

@section('acao', 'Listar')

@section('conteudo-principal')

<section class="section">

    <table class="highlight">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{$categoria->nome}}</td>
                    <td>{{$categoria->descricao}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Não existem categorias cadastradas</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.categorias.create')}}">
            <i class="large material-icons">add</i>
        </a>
    </div>
</section>

@endsection
