<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
   
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request,
        CriadorDeSerie $criadorDeSerie
    ) {
        //dd($request->all());
        $serie = $criadorDeSerie->criarSerie(
<<<<<<< HEAD
            ucfirst($request->nome),
            ucfirst($request->qtd_temporadas),
            ucfirst($request->ep_por_temporada),
            $request->foto
=======
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
>>>>>>> parent of de6efdd (commit)
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome} e suas temporadas e episódios criados com sucesso "
            );

            $email= new \App\Mail\NovaSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );
            $email->subject ="Nova Serie Adicionada {$serie->nome}!";
            $user =$request-> user();
            \Illuminate\Support\Facades\Mail::to($user)->send($email);


        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
}
