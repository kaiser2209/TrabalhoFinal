@extends('admin.layouts.principal')

@section('titulo', 'Produtos')

@section('acao', 'Adicionar')

@section('conteudo-principal')

    <section class="section">

        <form action="{{route('admin.produtos.adicionar')}}" method="POST">

            {{-- cross-site request forgery csrf --}}
            @csrf

            <div class="input-field">
                <input type="text" name="nome" id="nome" />
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="descricao" id="descricao" />
                <label for="descricao">Descrição</label>
                @error('descricao')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <div class="input-field">
                <input type="text" name="quantidade" id="quantidade" />
                <label for="quantidade">Quantidade</label>
                @error('quantidade')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </div>

            <label>
                <input type="checkbox" checked="checked" name="ativo" id="ativo" value="1"/>
                <span>Produto Ativo</span>
                @error('ativo')
                    <span class="red-text text-accent-3"><small>{{$message}}</small></span>
                @enderror
            </label>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>

@endsection
