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
            <div class="row py-3 align-items-center">
                <div class="col-md-4 text-start">
                    <img src="{{ asset('assets/samplemed-logo-horizontal-rgb.png') }}" class="img-fluid" alt="Logo"
                        style="max-width: 200px;">
                </div>
                @if (session('user'))
                    <div class="col-md-4">
                        <form action="{{ route('criarPost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Olá, {{ session('user')['name'] }}!</label>
                            <textarea id="postContent" name="content" class="form-control mb-2"
                                placeholder="Escreva a Descrição do post"
                                style="font-size: 1.2rem; height: 100px;"></textarea>
                            <input type="file" name="image" class="form-control mb-2" src="#" alt="Imagem do Post">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="col-md-4 text-end">
                        <img src="{{ asset('path/to/user-image.jpg') }}" class="img-fluid rounded-circle"
                            alt="Imagem do Usuário" style="max-width: 100px;">
                        <p>{{ session('user')['name'] }}</p>
                    </div>
                @else
                    <div class="col-md-4 text-center fs-3">
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
            @foreach ($posts as $post )
                <section class="">
                    <div class="overflow-hidden">
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-6">
                                <article>
                                    <div class="card border-0">
                                        <div class="card-body border bg-white p-4">
                                            <div class="mb-3">
                                                <h2 class="card-title h4">
                                                {{ $post['nm_usuario'] }}
                                                </h2>
                                            </div>
                                            <p class="card-text entry-summary text-secondary mb-3">
                                            {{ $post['nm_post'] }}
                                            </p>
                                        </div>
                                        <div class="card-footer border border-top-0 bg-light p-4">
                                            <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                                <li>
                                                    <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                        href="#!">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            fill="currentColor" class="bi bi-calendar3"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                            <path
                                                                d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                        </svg>
                                                        <!-- <span class="ms-2 fs-7">Publicado em {{ date('d M Y', strtotime($post['dt_post'])) }}</span> -->
                                                    </a>
                                                </li>
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </section>   
            @endforeach   
        </div>
    </main>
</body>

</html>