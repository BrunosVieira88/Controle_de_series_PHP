@extends('layout')

@section('cabecalho')
    Registrar-se
@endsection

@section('conteudo')
<form method="post">
    @csrf
    <div class="offset-md-3 col-md-6 offset-md-3 border  p-5 arredonda">
        <div class="form-group ">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required class="form-control">
        </div>
    
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>
    
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
    </div>
   
</form>
@endsection