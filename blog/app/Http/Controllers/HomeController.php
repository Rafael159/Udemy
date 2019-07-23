<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //array com o caminho das página visitadas
        $listaMigalhas = json_encode([
            ["titulo"=>"Home", "url"=>""]           
        ]);

        $qntArtigos = DB::table('artigos')->whereNull('deleted_at')->count();
        $qntAutores = DB::table('users')->where('autor', '=', 'S')->count();
        $qntUsers = DB::table('users')->count();
        

        return view('home', compact('listaMigalhas', 'qntArtigos', 'qntUsers', 'qntAutores'));
    }
}
