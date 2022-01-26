<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SeriesFormRequest;

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
        $serie = $criadorDeSerie->criarSerie(
            ucfirst($request->nome),
            ucfirst($request->qtd_temporadas),
            ucfirst($request->ep_por_temporada)
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->nome} e suas temporadas e episódios criados com sucesso "
            );

           
           
           
            $users = User::all();
            foreach ($users as $user) {
                $email= new \App\Mail\NovaSerie(
                    $request->nome,
                    $request->qtd_temporadas,
                    $request->ep_por_temporada
                );
                $email->subject ="Nova Série Adicionada {$serie->nome}!";
                \Illuminate\Support\Facades\Mail::to($user)->queue($email);
            }
           


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
