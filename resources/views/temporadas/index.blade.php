@extends('layout')

@section('cabecalho')
<div class="">
    @if (!$serie->foto_url)
   
            <a href="{{$serie->foto_url}}" target="blanck">
                <img src="{{$serie->foto_url}}" alt="Imagem da serie" class="img-thumbnail tamanho_imagem_grande" >
            </a>
            
    @endif
    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
</div> 
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/temporadas/{{ $temporada->id }}/episodios">
                Temporada {{ $temporada->numero }}
            </a>
            @auth
                <span class="badge badge-secondary">
                    {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>
            @endauth
           
        </li>
        @endforeach
    </ul>
@endsection