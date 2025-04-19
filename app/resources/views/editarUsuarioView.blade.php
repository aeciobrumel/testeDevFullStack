@extends('layout')

@section('content')
<h2>Editar Usuário</h2>

<form method="POST" action="{{ route('atualizar.usuario', ['id' => $usuario->id]) }}">
    @csrf
    @method('PUT')

    <input type="text" name="nome" value="{{ $usuario->nome }}" required>
    <input type="text" name="cpf" value="{{ $usuario->cpf }}" required>
    <input type="email" name="email" value="{{ $usuario->email }}">
    
    <select name="permissao" required>
        <option value="admin" {{ $usuario->permissao == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="moderador" {{ $usuario->permissao == 'moderador' ? 'selected' : '' }}>Moderador</option>
        <option value="leitor" {{ $usuario->permissao == 'leitor' ? 'selected' : '' }}>Leitor</option>
    </select>

    <button type="submit">Salvar Alterações</button>
</form>
@endsection
