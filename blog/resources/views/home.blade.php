@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <painel titulo="Dashboard">
                Teste de conteúdo
                <div class="row">
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 1" cor="blue">
                            Teste 1
                        </painel>
                    </div>
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 2" cor="panel-warning">
                            Teste 2
                        </painel>
                    </div>
                    <div class="col-md-4">
                        <painel titulo="Conteúdo 3" cor="orange">
                            Teste 3
                        </painel>
                    </div>
                </div>
            </painel>
        </div>
    </div>
</div>

@endsection
