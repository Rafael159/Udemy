@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    @if($errors->all())
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
            @foreach($errors->all() as $key => $value)
                <li><strong>{{$value}}</strong></li>
            @endforeach        
        </div>
    @endif

    <painel titulo="Lista de artigos">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
            v-bind:titulos="['#', 'Título', 'Descrição', 'Data']"
            v-bind:itens="{{$listaArtigos}}"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="#deletar" token="5465413212"
            modal="sim"
        ></tabela-lista>
    </painel>
</pagina>

<!--Modal Adicionar-->
<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" class="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" name="conteudo" id="conteudo"> {{old('conteudo')}}</textarea>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data"  value="{{old('data')}}">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>  
    </span>
</modal>

<!--Modal Editar-->
<modal nome="editar" titulo="Editar">    
    <formulario id="formEditar" class="" :action="'/admin/artigos/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">        
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" v-model="$store.state.item.descricao">
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo</label>
            <textarea class="form-control" name="conteudo" id="conteudo" v-model="$store.state.item.conteudo"></textarea>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="datetime-local" class="form-control" id="data" name="data" v-model="$store.state.item.data">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Editar</button>
    </span>
</modal>
<!--Modal Detalhes-->
<modal nome="detalhe" v-bind:titulo="$store.state.item.titulo"> 
    <strong>Descrição: </strong><br/> 
    <p>@{{$store.state.item.descricao}}</p>

    <strong>Conteúdo: </strong><br/>
    <div class="alert alert-info">
        <p>@{{$store.state.item.conteudo}}</p>
    </div>
</modal>

@endsection