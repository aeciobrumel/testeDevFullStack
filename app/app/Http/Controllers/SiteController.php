<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function initLoginView(){
        
    // Verificar se o usuário já está logado
    if (Auth::check()) {
    // Se já estiver logado, redirecionar para a página de cadastro
    return redirect()->route('listar_page');
    }

    // Caso contrário, exibir a página de login
    return view('loginView');
     }
////////////////////////////////////////////////////////////////////////////////////
//Login e logout



public function fazerLogin(Request $request)
{
    $request->validate([
        'cpf' => 'required',
        'senha' => 'required',
    ]);

    $user = User::where('cpf', $request->cpf)->first();

    if ($user && Hash::check($request->senha, $user->senha)) {
        Auth::login($user);
        return redirect()->route('listar_page')->with('success', 'Login realizado com sucesso.');
    }

    return back()->withErrors(['cpf' => 'CPF ou senha inválidos.'])->withInput();
}

public function logout()
{
    Auth::logout(); // Desloga o usuário
    return redirect()->route('login_page')->with('success', 'Logout realizado com sucesso.');
}




public function initCadastrarUsuarioView()
{
    return view('cadastrarUsuarioView');
}







/////////////////////////////////////////////////////////////////////
/// Inicializa listar view
public function initListarView()
{
    $usuarios = User::all();  // Retorna uma coleção de objetos
    return view('listarView', compact('usuarios'));
}


////////////////////////     CRUD         /////////////////////////// 
//criar o usuario

public function registrarUsuario(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'cpf' => 'required|unique:users',
        'email' => 'nullable|email|unique:users',
        'senha' => 'required|min:4',
        'permissao' => 'required|in:admin,moderador,leitor'
    ]);

    User::create([
        'nome' => $request->nome,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'senha' => bcrypt($request->senha), // Criptografar a senha!
        'permissao' => $request->permissao,
    ]);

    return redirect()->route('listar_page')->with('success', 'Usuário cadastrado com sucesso!');
}

/////////////////////////////////////////////////////////////////////////////////////////
//editar o usuario

public function editarUsuario($id)
{
    $usuario = User::findOrFail($id);

    // Apenas admin ou moderador podem acessar
    if (Auth::user()->permissao === 'leitor') {
        return redirect()->route('cadastro_page')->with('error', 'Permissão negada.');
    }

    return view('editarUsuarioView', compact('usuario'));
}

// Atualiza o usuário no banco de dados 

public function atualizarUsuario(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    $request->validate([
        'nome' => 'required',
        'cpf' => 'required|unique:users,cpf,'.$id,
        'email' => 'nullable|email|unique:users,email,'.$id,
        'permissao' => 'required|in:admin,moderador,leitor',
    ]);

    $usuario->update([
        'nome' => $request->nome,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'permissao' => $request->permissao,
    ]);

    return redirect()->route('listar_page')->with('success', 'Usuário atualizado com sucesso.');
}

//////////////////////////////////////////////////////////////////////////////////////////////////////
// excluir o usuário
public function excluirUsuario($id)
{
    $usuario = User::findOrFail($id);

    // Apenas admin pode excluir
    if (Auth::user()->permissao !== 'admin') {
        return redirect()->route('listar_page')->with('error', 'Permissão negada.');
    }

    $usuario->delete();

    return redirect()->route('listar_page')->with('success', 'Usuário excluído com sucesso.');
}
}