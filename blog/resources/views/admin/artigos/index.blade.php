@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
            v-bind:titulos="['#', 'Título', 'Descrição', 'Data']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="5465413212"
            modal="sim"
        ></tabela-lista>
    </painel>
</pagina>

<!--Modal Adicionar-->
<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" class="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" name="conteudo" id="conteudo"></textarea>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data">
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