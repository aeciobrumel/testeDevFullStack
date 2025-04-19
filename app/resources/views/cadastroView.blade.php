@extends('layout')
@section('content')


<h1>Cadastro de Usuários</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif



<!-- verifica se é leitor para mostrar o cadastro-->
@if(Auth::user()->permissao !== 'leitor')
<form method="POST" action="{{ route('registrar.usuario') }}">
    @csrf
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="cpf" placeholder="CPF" required>
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha" required>
    <select name="permissao" required>
        <option value="admin">Admin</option>
        <option value="moderador">Moderador</option>
        <option value="leitor">Leitor</option>
    </select>
    <button type="submit">Cadastrar</button>
</form>
@endif
<hr>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Permissão</th>
            <th>Ações</th> 
        </tr>
    </thead>
    <tbody>
        @forelse($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->cpf }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->permissao }}</td>
                <td>
                    <!-- SE o usuario authenticado for admin ou moderador 
                    ele ve botao de editar 
                    -->

                    @if(Auth::user()->permissao === 'admin' || Auth::user()->permissao === 'moderador')
                        <!-- Botão de Editar -->
                        <a href="{{ route('editar.usuario', ['id' => $usuario->id]) }}">Editar</a>
                    @endif

                    <!-- SE o usuario authenticado for admin ou  
                    ele ve botao de excluir
                    -->
                    @if(Auth::user()->permissao === 'admin')
                        <!-- Botão de Excluir -->
                        <form action="{{ route('excluir.usuario', ['id' => $usuario->id]) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum usuário cadastrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>




@endsection

