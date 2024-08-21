<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="style" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
 
        <div class="container mt-3">
        <div class="row py-3 align-items-center justify-content-center">
            <div class="col-md-3 col align-self-start">
                <img src="{{ asset('assets/samplemed-logo-horizontal-rgb.png') }}" class="img-fluid" alt="Logo"
                    style="max-width: 200px;">
            </div>
           
            @if (session('user'))
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="form-label fw-bold">Olá, {{ session('user')['nome'] }}!</label>
                        <textarea id="postContent" name="content" class="form-control mb-2"
                            placeholder="Escreva a Descrição do post"
                            style="font-size: 1.2rem; height: 100px;"></textarea>
                        <input type="file" name="image" class="form-control mb-2" alt="Imagem do Post">
                        <button class="btn btn-primary w-100" type="submit">Enviar</button>
                    </form>
                </div>
                <div class="col-md-3 col align-self-start">
                    <div class="d-flex justify-content-end ">
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
            @else
                <div class="col-md-6 text-center fs-3">
                    <p>Cadastre-se para poder postar</p>
                </div>
                <div class="col-md-6 text-end">
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
                            <article>
                                <div class="card border-0">
                                    <div class="card-body border bg-white p-4">
                                        <div class="mb-3">
                                            <h2 class="card-title h4">
                                                teste
                                            </h2>
                                        </div>
                                        <p class="card-text entry-summary text-secondary mb-3">
                                            teste
                                        </p>
                                    </div>
                                    <div class="card-footer border border-top-0 bg-light p-4">
                                        <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                            <li>
                                                <a class="fs-7 link-secondary text-decoration-none d-flex align-items-center"
                                                    href="#!">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                        fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                                        <path
                                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                                        <path
                                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                    <span class="ms-2 fs-7">Publicado em </span>
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
        </div>
    </main>
</body>

</html>