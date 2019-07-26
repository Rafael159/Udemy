<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
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
            ["titulo"=>"Admin", "url"=>""]           
        ]);

        $qntArtigos = DB::table('artigos')->whereNull('deleted_at')->count();
        $qntAutores = DB::table('users')->where('autor', '=', 'S')->count();
        $qntAdmin = DB::table('users')->where('admin', '=', 'S')->count();
        $qntUsers = DB::table('users')->count();
        

        return view('admin', compact('listaMigalhas', 'qntArtigos', 'qntUsers', 'qntAutores', 'qntAdmin'));
    }
}
