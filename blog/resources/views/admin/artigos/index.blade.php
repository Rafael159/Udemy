@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <modallink tipo="link" nome="meuModalTeste" titulo="Criar" css="btn btn-success"></modallink>    

        <tabela-lista 
            v-bind:titulos="['#', 'Título', 'Descrição']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="5465413212"
        ></tabela-lista>
    </painel>
</pagina>
<modal nome="meuModalTeste">
    <painel titulo="Adicionar">
        <formulario class="" action="#" method="deLete" enctype="" token="">        
            <div class="form-group">
                <label for="titulo">Email address</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
            </div>
            <button class="btn btn-info">Adicionar</button>  
        </formulario>
    </painel>
</modal>

@endsection