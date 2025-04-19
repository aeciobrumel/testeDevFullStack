@extends('layout')

@section('content')


<h1>Seja bem vindo (a) </h1>


<!-- Login Form -->
<form method="POST" action="{{ route('fazer.login') }}">
    @csrf
    <div>
        <x-input label="CPF" name="cpf" required="true" placeholder="Digite o CPF" />
    </div>

    <div>
        <x-input label="Senha" name="senha" type="password" required="true" placeholder="Senha" />
    </div>

    <button type="submit">Entrar</button>
</form>

@endsection


