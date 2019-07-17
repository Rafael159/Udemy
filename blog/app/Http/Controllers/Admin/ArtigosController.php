<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Artigo;

class ArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //array com o caminho das página visitadas
        $listaMigalhas = json_encode([
            ["titulo"=>"Home", "url"=>route('home')],
            ["titulo"=>"Lista de Artigos", "url"=>""]
        ]);
        
        $listaArtigos = json_encode(Artigo::select('id', 'titulo', 'descricao', 'data')->get());

        return view('admin.artigos.index', compact('listaMigalhas', 'listaArtigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        //pegar dados vindos do formulário
        $data = $request->all();

        //validação
        $validacao = \Validator::make(
            $data, [
                "titulo" => "required",
                "descricao" => "required",
                "conteudo" => "required",
                "data" => "required"
            ],
            $messages = [
                "titulo.required" => "Vai preencher o título ou o que?",
                "descricao.required" => "Vai deixar a descrição vazia mesmo?",
                "conteudo.required" => "Que palhaçada é essa tio? Escreva alguma coisa no conteúdo",
                "data.required" => "Quer que eu adivinhe a data?"
            ]
    );

        if($validacao->fails()){
            return redirect()->back()->withErrors($validacao)->withInput();
        }

        //enviar para a model
        Artigo::create($data);

        //voltar para a página
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Artigo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
