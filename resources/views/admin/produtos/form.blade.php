@extends('admin.layouts.principal')

@section('titulo', 'Produtos')

@section('acao', 'Adicionar')

@section('conteudo-principal')

    <section class="section">

        <form action="{{$action}}" method="POST">

            {{-- cross-site request forgery csrf --}}
            @csrf
            @isset($produto)
                @method('PUT')
            @endisset

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome', $produto->nome ?? '')}}" />
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="descricao" id="descricao" value="{{old('descricao', $produto->descricao ?? '')}}" />
                <label for="descricao">Descrição</label>
                @error('descricao')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="input-field">
                <input type="number" name="quantidade" id="quantidade" value="{{old('quantidade', $produto->quantidade ?? '')}}" />
                <label for="quantidade">Quantidade</label>
                @error('quantidade')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="input-field">
                <select name="categoria_id" id="">
                    <option value="" disabled selected>Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
            </div>

            <label>
                <input type="checkbox" checked="checked" name="ativo" id="ativo" value="1"/>
                <span>Produto Ativo</span>
                @error('ativo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </label>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('admin.produtos.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>

@endsection
