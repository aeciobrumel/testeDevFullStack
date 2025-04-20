@extends('layout')

@section('content')
<div class="form-wrapper">
<form class="form-grande form-container"  method="POST" action="{{ route('fazer.login') }}">
    @csrf
    <div class="login-form-root">

    <h1 class="title-form">Faça seu login</h1>
        <div id="react-input-cpf"
            data-props="{!! htmlspecialchars(json_encode([
                'name' => 'cpf',
                'placeholder' => 'Digite o CPF',
                'required' => true
            ]), ENT_QUOTES, 'UTF-8') !!}">
        </div>
        <div id="react-input-senha"
            data-props="{!! htmlspecialchars(json_encode([
                'name' => 'senha',
                'placeholder' => 'Senha',
                'type' => 'password',
                'required' => true
            ]), ENT_QUOTES, 'UTF-8') !!}">
        </div>
        <div id="react-button-enviar"
           data-props='@json([
           "children" => "Entrar",
            "color" => "#393836",
            "fullWidth" => true
         ])'>
        </div>     
        </div>
</form>
</div>


@endsection