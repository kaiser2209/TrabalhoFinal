@extends('admin.layouts.principal')

@section('titulo', 'Categorias')

@section('acao', 'Adicionar')

@section('conteudo-principal')

    <section class="section">

        <form action="{{$action}}" method="POST">

            {{-- cross-site request forgery csrf --}}
            @csrf
            @isset($categoria)
                @method('PUT')
            @endisset

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome', $categoria->nome ?? '')}}" />
                <label for="nome">Nome</label>
            </div>

            <div class="input-field">
                <input type="text" name="descricao" id="descricao" value="{{old('descricao', $categoria->descricao ?? '')}}" />
                <label for="descricao">Descrição</label>
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('admin.categorias.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>

@endsection
