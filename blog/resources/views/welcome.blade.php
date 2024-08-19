<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->
        <link rel="style" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/css/bootstrap.css">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
        <div class="container mt-3">
            <div class="row align-items-center">
                <div class="col-md-4 text-start">
                    <img src="{{ asset('assets/samplemed-logo-horizontal-rgb.png') }}" class="img-fluid" alt="Logo" style="max-width: 200px;">
                </div>
                @if (session('user'))
                    <div class="col-md-4">
                        <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Olá, {{ session('user')['name'] }}!</label>
                            <textarea id="postContent" name="content" class="form-control mb-2" placeholder="Escreva a Descrição do post" 
                              style="font-size: 1.2rem; height: 100px;"></textarea>
                            <input type="file" name="image" class="form-control mb-2" src="#" alt="Imagem do Post">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <img src="{{ asset('path/to/user-image.jpg') }}" class="img-fluid rounded-circle" alt="Imagem do Usuário" style="max-width: 100px;">
                        <p>{{ session('user')['name'] }}</p>
                    </div>
                @else
                    <div class="col-md-4">
                        <p>Cadastre-se para poder postar</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="/login" class="btn btn-primary">Login</a>
                    </div>
                @endif
            </div>
        </div>
    </header>
    <main>
        <div class="container mt-4">
            <div class="posts">
                <!-- Aqui você pode adicionar o código para exibir os posts -->
            </div>
        </div>
    </main>
</body>
</html>
