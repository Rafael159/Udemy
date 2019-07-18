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

    <painel titulo="Lista de usuários">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
        <tabela-lista 
            v-bind:titulos="['#', 'Nome', 'Email']"
            v-bind:itens="{{ json_encode($listaModelo) }}"
            ordem="desc" ordemcol="1"
            criar="#criar" detalhe="/admin/usuarios/" editar="/admin/usuarios/" deletar="/admin/usuarios/" token="{{ csrf_token() }}"
            modal="sim"
        ></tabela-lista>
        <div align="center">
            {{ $listaModelo }}
        </div>
    </painel>
</pagina>

<!--Modal Adicionar-->
<modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" class="" action="{{route('usuarios.store')}}" method="post" enctype="" token="{{ csrf_token() }}">        
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha" value="{{old('password')}}">            
        </div>        
    </formulario>
    <span slot="botoes">
        <button form="formAdicionar" class="btn btn-info">Adicionar</button>  
    </span>
</modal>

<!--Modal Editar-->
<modal nome="editar" titulo="Editar">    
    <formulario id="formEditar" class="" :action="'/admin/usuarios/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">        
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" v-model="$store.state.item.name">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" v-model="$store.state.item.email">
        </div>       
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </formulario>
    <span slot="botoes">
        <button form="formEditar" class="btn btn-info">Editar</button>
    </span>
</modal>
<!--Modal Detalhes-->
<modal nome="detalhe" v-bind:titulo="$store.state.item.name"> 
   
    <strong>Email: </strong><br/>
    <div class="alert alert-info">
        <p>@{{$store.state.item.email}}</p>
    </div>
</modal>

@endsection