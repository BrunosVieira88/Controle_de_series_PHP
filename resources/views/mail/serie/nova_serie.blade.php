@extends('layout')

@section('cabecalho')
    E-mail
@endsection

@section('conteudo')
   
   <div class="row d-flex justify-content-center mt-4 text-center">
        <div class="col-md-12" > <h1>Nova Serie no Catalogo {{$nome}}</h1> </div>
        <div class="col-md-6 text-right" > numero de Temporadas {{$temporadas}} </div>
        <div class="col-md-6 text-left">numero de Episodios {{$episodios}} </div>
    </div>
   
@endsection