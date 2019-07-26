
@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Artigos">

        <p>
            <form class="form-inline text-center" action="{{route('site')}}" method="get">
                <input type="search" name="busca" class="form-control" placeholder="Buscar" value="{{ isset($busca) ? $busca : ''}}">
                <button class="btn btn-info">Buscar</button>
            </form>
        </p>

        <div class="row">
            @foreach ($lista as $key => $value)
                <artigocard
                    titulo="{{str_limit($value->titulo, 25, '...')}}"
                    descricao="{{str_limit($value->descricao, 50, ' (...)')}}"
                    link="{{ route('artigo', [$value->id, str_slug($value->titulo)]) }}"
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