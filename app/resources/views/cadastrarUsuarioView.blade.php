@extends('layout')

@section('content')
@if(Auth::user()->permissao !== 'leitor')
<div class="form-wrapper">
<form class="form-container" method="POST" action="{{ route('registrar.usuario') }}">
        @csrf
        <h1 class="title-form">Cadastrar Usuário</h1>

        <div id="react-input-nome"
            data-props="{!! htmlspecialchars(json_encode([
                'name' => 'nome',
                'placeholder' => 'Nome completo',
                'required' => true
            ]), ENT_QUOTES, 'UTF-8') !!}">
        </div>

        <div id="react-input-cpf"
            data-props="{!! htmlspecialchars(json_encode([
                'name' => 'cpf',
                'placeholder' => 'Digite o CPF',
                'required' => true
            ]), ENT_QUOTES, 'UTF-8') !!}">
        </div>

        <div id="react-input-email"
            data-props="{!! htmlspecialchars(json_encode([
                'name' => 'email',
                'placeholder' => 'Email',
                'type' => 'email',
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

        <div>
            <label for="permissao">Permissão</label>
            <select name="permissao" required class="form-control">
                <option value="admin">Admin</option>
                <option value="moderador">Moderador</option>
                <option value="leitor">Leitor</option>
            </select>
        </div>
<div class="container-buttons">
<div id="react-button-enviar"
            data-props='@json([
            "children" => "Cadastrar",
                "color" => "#424242",
                "fullWidth" => false
            ])'>
        </div>     

        @csrf
        <div id="react-button-cadastrar-usuario"
            data-props='{
            "children":"Cancelar",
            "color":"#db4949",
            "fullWidth":false,
            "onClickUrl":"listar"
            }'>
        </div>
</div>
      
</form>   
</div>

@endif
      



@endsection