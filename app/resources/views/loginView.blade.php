@extends('layout')

@section('content')


<h1>Seja bem vindo (a) </h1>


<!-- Login Form -->
<form method="POST" action="{{ route('fazer.login') }}">
    @csrf
    <div>
        <label for="cpf">CPF</label>
        <input id="cpf" type="text" name="cpf" required autofocus>
    </div>

    <div>
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" required>
    </div>

    <button type="submit">Entrar</button>
</form>

@endsection


