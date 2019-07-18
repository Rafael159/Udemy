@extends('layouts.app')

@section('content')

<pagina tamanho="10">
    <painel titulo="Dashboard">  
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
          
        <div class="row">
            <div class="col-md-4">
                <caixa qnt="80" titulo="Artigos" url="{{route('artigos.index')}}" cor="#ffa500" icone="ion ion-document-text"></caixa>
            </div>
            <div class="col-md-4">
                <caixa qnt="1500" titulo="Usuários" url="{{route('usuarios.index')}}" cor="#0080ff" icone="ion ion-person-stalker"></caixa>
            </div>
            <div class="col-md-4">
                <caixa qnt="3" titulo="Autores" url="#" cor="#940000" icone="ion ion-person"></caixa>
            </div>
        </div>
    </painel>
</pagina>

@endsection
