@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')
@include('erros', ['errors' => $errors])

<form method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
                <label for="nome">Nome</label>
            <input type="text" class="form-control" required name="nome" id="nome">
        </div>
        <div class="col-md-3">
                <label for="qtd_temporadas">Nº temporadas</label>
            <input type="number" class="form-control" required name="qtd_temporadas" id="qtd_temporadas">
        </div>
        <div class="col-md-3">
                <label for="ep_por_temporada">Ep. por temporada</label>
            <input type="number" class="form-control" required name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>

    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection