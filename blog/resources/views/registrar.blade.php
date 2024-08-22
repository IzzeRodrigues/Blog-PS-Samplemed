<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="style" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
<script>
    function getCookie(name) {
        let value = "; " + document.cookie;
        let parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
    }
    let alertMessage = getCookie('alert_message1');
    if (alertMessage) {
        alert(decodeURIComponent(alertMessage));
    }
</script>
<form action="{{route('registro')}}" method="POST" class="d-flex flex-column align-items-center mt-5">
    @csrf
    <h3>Crie sua Conta</h3>
    <div class="container mt-5 w-50">
        <div class="form-outline mb-4 w-100">
            <input type="text" id="nome" name="nome" class="form-control" />
            <label class="form-label">Nome de usuário</label>
        </div>
        <div class="form-outline mb-4 w-100">
            <input type="email" id="email" name="email" class="form-control" />
            <label class="form-label">Email</label>
        </div>
        <div class="form-outline mb-4 w-100">
            <input type="password" id="senha" name="senha" class="form-control" />
            <label class="form-label">Senha</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Cadastrar</button>
    </div>
</form>
</body>
</html>