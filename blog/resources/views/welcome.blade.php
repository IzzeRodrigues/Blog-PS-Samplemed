<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="style" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        .scroll-to-top {
            position: fixed;
            bottom: 10px;
            right: 10px;
            display: none;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <header>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center">
                        <div class="align-self-start">
                            <img src="{{ asset('assets/samplemed-logo-horizontal-rgb.png') }}" class="img-fluid "
                            alt="Logo" style="max-width: 200px;">
                        </div>
                    </div>
                </div>

                @if (session('user'))
                    
                    <div class="col-md-6">
                        <form action="{{route('Logar')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="form-label fw-bold">Olá, {{ session('user')['nome'] }}!</label>
                        </form>

                            <form action="{{route('criarPost')}}" method="GET">
                                @csrf
                                <input type="hidden" name="nome" value="{{ session('user')['nome'] }}"/>
                                <textarea id="desc" name="desc" class="form-control mb-2"
                                    placeholder="Escreva a Descrição do post"
                                    style="font-size: 1.2rem; height: 100px;"></textarea>
                                <input type="file" name="img" id="img" class="form-control mb-2" alt="Imagem do Post">
                                <button class="btn btn-primary w-100" type="submit">Enviar</button>
                            </form>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <div class="align-self-start d-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-0 fw-bold fs-5 ms-2">{{ session('user')['nome'] }}</p>
                            </div>
                        </div>
                    </div>
                       <div class="col-md-3 d-flex flex-column">
                            <div class="d-flex justify-content-center" >
                                <div class="align-self-end">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Sair</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                @else
    
                <div class="col-md-6 text-center fs-3">
                    <p>Cadastre-se para poder postar</p>
                </div>
                <div class="col-md-3 text-end">
                    <a href="/login" class="btn btn-primary">Login</a>
                </div>
                @endif
            </div>
        </div>
    </header>
    <main>
        <div class="container mt-4">
            <section>
                <div class="overflow-hidden">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">

                           <?php 
    
                           $conexao = Http::get('http://localhost/blog-ps-samplemed/api_blog/posts');
                           $body = $conexao->json(); 

                            session_start();
                            $_SESSION['post'] = $body;
                           
                           ?>
                       <article>
                        @foreach($_SESSION['post'] as $post)
                        <div class="card border-0 my-5">
                                    <div class="card-body border bg-white p-4">
                                        <div class="mb-3">
                                            <h2 class="card-title h4">
                                            {{ $post['nm_usuario'] }}
                                            </h2>
                                        </div>
                                        <img src="{{ $post['img_post'] }}" alt="">
                                        <p class="card-text entry-summary text-secondary mb-3">
                                        {{ $post['nm_post'] }}
                                        </p>
                                    </div>
                                    <div class="card-footer border border-top-0 bg-light p-4">
                                        <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                            <li>
                                                <p class="fs-7 link-secondary text-decoration-none d-flex align-items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                        <path
                                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                    <span class="ms-2 fs-7">Publicado em {{ $post['dt_post'] }}</span>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </article>
                          <button class="btn btn-primary scroll-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">Voltar ao Topo</button>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </main>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('scroll', function() {
        const scrollButton = document.querySelector('.scroll-to-top');
        if (window.scrollY > 200) {
            scrollButton.style.display = 'block';
        } else {
            scrollButton.style.display = 'none';
        }
    });
</script>
</body>

</html>