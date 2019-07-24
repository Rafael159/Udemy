@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Artigos">
        <div class="row">
            @foreach ($lista as $key => $value)
                <artigocard
                    titulo="{{$value->titulo}}"
                    descricao="{{$value->descricao}}"
                    link="#"
                    imagem="https://media.istockphoto.com/photos/growing-tree-to-save-ecological-sustainability-sustainable-and-picture-id956676682?k=6&m=956676682&s=612x612&w=0&h=kBjCU53euVOYNpjuPvkA_H3URkFqkfzkSXwgKzzd0Mo="
                    data="{{$value->data}}"
                    autor="{{$value->autor}}"
                    sm="6"
                    md="4"
                >
                </artigocard>
            @endforeach            
            
        </div>
        <div align="center">{{$lista}}</div>
    </painel>

</pagina>

@endsection