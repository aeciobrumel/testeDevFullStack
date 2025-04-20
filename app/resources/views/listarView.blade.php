@extends('layout')

@section('content')



<div class="container-user-card">



                        @if(Auth::user()->permissao !== 'leitor')
                            @csrf
                            <div id="react-button-cadastrar-usuario"
                            data-props='{
                            "children":"Cadastrar novo usuário",
                            "color":"#E08D19",
                            "fullWidth":false,
                            "onClickUrl":"cadastrarUsuario"
                            }'>
                            </div>
                                                    
                        @endif

                        <div id="react-user-card-list"
                        data-props="{!! htmlspecialchars(json_encode([
                            'users' => $usuarios,
                            'currentUser' => Auth::user()
                        ]), ENT_QUOTES, 'UTF-8') !!}">
                        </div>
</div>

@endsection
