<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .vertical-line {
            border-left: 1px solid #ccc;
            height: 100vh;
            position: absolute;
        }
        .scroll-to-top {
            position: fixed;
            bottom: 10px;
            right: 10px;
            display: none;
            z-index: 1000;
        }
        .position-fixed-bottom-left {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <div class="container mt-3">
        <div class="row py-3">
            <!-- Coluna com logo e botão de sair -->
            <div class="col-md-3 d-flex flex-column" style="height: 100vh;">
                <div class="d-flex justify-content-center align-items-start">
                    <img src="{{ asset('assets/samplemed-logo-horizontal-rgb.png') }}" class="img-fluid" alt="Logo" style="max-width: 200px;">
                </div>
                @if (session('user'))
                    <div class="mt-auto position-fixed-bottom-left d-flex justify-content-start">
                        <form action="{{ route('logout') }}" method="POST" class="d-flex">
                            @csrf
                            <button type="submit" class="btn btn-danger">Sair</button>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Linha vertical à esquerda -->
            <div class="vertical-line" style="left: 0;"></div>

            <!-- Formulário e posts -->
            <div class="col-md-6 d-flex flex-column align-items-center">
                @if (session('user'))
                    <form action="" method="POST" enctype="multipart/form-data" class="mb-3">
                        @csrf
                        <label class="form-label fw-bold">Olá, {{ session('user')['nome'] }}!</label>
                        <textarea id="postContent" name="content" class="form-control mb-2" placeholder="Escreva a Descrição do post" style="font-size: 1.2rem; height: 100px;"></textarea>
                        <input type="file" name="image" class="form-control mb-2" alt="Imagem do Post">
                        <button class="btn btn-primary w-100" type="submit">Enviar</button>
                    </form>
                @endif
                <!-- Posts aqui -->
                <div class="posts">
                    <!-- Adicione seus posts aqui -->
                </div>
            </div>

            <!-- Linha vertical à direita -->
            <div class="vertical-line" style="right: 0;"></div>

            <!-- Informações do usuário -->
            <div class="col-md-3 d-flex align-items-center justify-content-end">
                @if (session('user'))
                    <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <p class="mb-0 fw-bold fs-5 ms-2">{{ session('user')['nome'] }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>

<!-- Botão de rolar para cima -->
<button class="btn btn-primary scroll-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">Voltar ao Topo</button>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Mostrar o botão de rolar para cima quando o usuário rolar para baixo
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
