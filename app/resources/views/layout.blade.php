<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
    @yield('title', 'Aplicação de Login')
    </title>
</head>
<body>
    <header>
        <h1>Aplicação de login</h1>
        @if(Auth::check())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endif

    </header>
    <hr/>
    <main>
        @yield('content')
    </main>
         <hr/>
    <footer>
        <p>&copy; 2025 Desenvolvido por Brumel</p>
    </footer>    



</body>
</html>