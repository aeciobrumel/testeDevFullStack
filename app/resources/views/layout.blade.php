<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        
    @yield('title', 'Aplicação de Login')
    </title>
    
</head>
<body>
    <header>
    @csrf
    
            <div id="react-header"
                data-props='@json([
                    "isAuthenticated" => Auth::check(),
                    "logoutUrl" => route("logout"),
                    "csrfToken" => csrf_token()
                ])'>
            </div>



    </header>
    <main style="flex:1 ; display:flex;  flex-direction:column;">
        @yield('content')
    </main>
         <div id="footer-react"></div>


    @viteReactRefresh
@vite(['resources/js/app.jsx'])


</body>
</html>