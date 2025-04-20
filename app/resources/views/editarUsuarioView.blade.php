
@extends('layout')

@section('content')
<div class="form-wrapper">
    
<form class="form-container" method="POST" action="{{ route('atualizar.usuario', ['id' => $usuario->id]) }}">
    @csrf
    @method('PUT')
    <h1 class="title-form">Editar Usuário</h1>
    <div id="react-input-nome"
         data-props='{!! htmlspecialchars(json_encode([
           "label" => "Nome: ",
            "name" => "nome",
             "placeholder" => $usuario->nome,
             "value" => $usuario->nome,
             "required" => true
         ]), ENT_QUOTES, "UTF-8") !!}'>
    </div>

    <div id="react-input-cpf"
         data-props='{!! htmlspecialchars(json_encode([
            "label" => "CPF: ",
             "name" => "cpf",
             "placeholder" => $usuario->cpf,
             "value" => $usuario->cpf,
             "required" => true
         ]), ENT_QUOTES, "UTF-8") !!}'>
    </div>

    <div id="react-input-email"
         data-props='{!! htmlspecialchars(json_encode([
            "label" => "Email",
             "name" => "email",
             "placeholder" => $usuario->email,
             "value" => $usuario->email,
             "type" => "email"
         ]), ENT_QUOTES, "UTF-8") !!}'>
    </div>

    <select class="select" name="permissao" required >
        <option value="admin" {{ $usuario->permissao == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="moderador" {{ $usuario->permissao == 'moderador' ? 'selected' : '' }}>Moderador</option>
        <option value="leitor" {{ $usuario->permissao == 'leitor' ? 'selected' : '' }}>Leitor</option>
    </select>
    <div class="container-buttons">
                <div id="react-button-salvar"
                    data-props='{!! htmlspecialchars(json_encode([
                        "children" => "Salvar ",
                        "fullWidth" => false,
                        "color" => "#424242",
                    ]), ENT_QUOTES, "UTF-8") !!}'>
                </div>
            @csrf
            <div id="react-button-cancelar"
    data-props='{!! htmlspecialchars(json_encode([
        "children" => "Cancelar",
        "color" => "#db4949",
        "fullWidth" => false,
        "onClickUrl" => route("listar_page")
    ]), ENT_QUOTES, "UTF-8") !!}'>
            

    </div>
    </div>

</form>
</div>

@endsection
