@extends('layouts.app')

@section('content')

<pagina tamanho="10">
    <painel titulo="Dashboard">  
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
          
        <div class="row">
            <div class="col-md-4">
                <caixa qnt="{{$qntArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="#ffa500" icone="ion ion-document-text"></caixa>
            </div>
            <div class="col-md-4">
                <caixa qnt="{{$qntUsers}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="#0080ff" icone="ion ion-person-stalker"></caixa>
            </div>
            <div class="col-md-4">
                <caixa qnt="{{$qntAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="#940000" icone="ion ion-person"></caixa>
            </div>
        </div>
    </painel>
</pagina>

@endsection
