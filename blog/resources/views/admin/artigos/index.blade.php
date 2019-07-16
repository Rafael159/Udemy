@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
            v-bind:titulos="['#', 'Título', 'Descrição']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="5465413212"
            modal="sim"
        ></tabela-lista>
    </painel>
</pagina>

<!--Modal Adicionar-->
<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" class="" action="#" method="deLete" enctype="" token="">        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>  
    </span>
</modal>

<!--Modal Editar-->
<modal nome="editar" titulo="Editar">    
    <formulario id="formEditar" class="" action="#" method="deLete" enctype="" token="">        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"  v-model="$store.state.item.descricao">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Editar</button>
    </span>
</modal>
<!--Modal Detalhes-->
<modal nome="detalhe" v-bind:titulo="$store.state.item.titulo">    
    <p>@{{$store.state.item.descricao}}</p>
</modal>

@endsection