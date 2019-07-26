@extends('layouts.app')

@section('content')

<pagina tamanho="10">
    <painel titulo="Dashboard">  
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
          
        <div class="row">
            @can('autor')
                <div class="col-md-4">
                    <caixa qnt="{{$qntArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="#ffa500" icone="ion ion-document-text"></caixa>
                </div>
            @endcan
            @can('eAdmin')
                <div class="col-md-4">
                    <caixa qnt="{{$qntUsers}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="#0080ff" icone="ion ion-person-stalker"></caixa>
                </div>            
                <div class="col-md-4">
                    <caixa qnt="{{$qntAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="#940000" icone="ion ion-person"></caixa>
                </div>           
                <div class="col-md-4">
                    <caixa qnt="{{$qntAdmin}}" titulo="Admin" url="{{route('adm.index')}}" cor="green" icone="ion ion-person"></caixa>
                </div>
            @endcan
        </div>
    </painel>
</pagina>

@endsection
