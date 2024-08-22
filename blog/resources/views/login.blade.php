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
    let alertMessage = getCookie('alert_message');
    if (alertMessage) {
        alert(decodeURIComponent(alertMessage));
    }
</script>
<form action="{{route('Logar')}}" method="POST" class="d-flex flex-column align-items-center mt-5">
    @csrf
    <h3>Bem vindo! Entre com seu usuário.</h3>
    <div class="container mt-5 w-50">
        <div class="form-outline mb-4 w-100">
            <input id="nome" name="nome" class="form-control" />
            <label class="form-label" for="form2Example1">Nome de usuário</label>
        </div>
        <div class="form-outline mb-4 w-100">
            <input type="password" id="senha" name="senha" class="form-control" />
            <label class="form-label" for="form2Example2">Senha</label>
        </div>
        <div class="row mb-4 w-100">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Lembre de mim </label>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Logar</button>
        <div class="text-center w-100">
            <p>Não possui conta? <a href="/registrar">Registre-se</a></p>
        </div>
    </div>
</form>

</body>

</html>