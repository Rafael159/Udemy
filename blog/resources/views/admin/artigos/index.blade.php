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
<modal nome="adicionar">
    <painel titulo="Adicionar">
        <formulario class="" action="#" method="deLete" enctype="" token="">        
            <div class="form-group">
                <label for="titulo">Título</label>
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

<!--Modal Editar-->
<modal nome="editar">
    <painel titulo="Editar">
        <formulario class="" action="#" method="deLete" enctype="" token="">        
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" v-model="$store.state.item.titulo">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"  v-model="$store.state.item.descricao">
            </div>
            <button class="btn btn-info">Editar</button>  
        </formulario>
    </painel>
</modal>
<!--Modal Detalhes-->
<modal nome="detalhe">
    <painel v-bind:titulo="$store.state.item.titulo">
       <p>@{{$store.state.item.descricao}}</p>
    </painel>
</modal>

@endsection