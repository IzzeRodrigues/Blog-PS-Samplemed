<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="style" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<form action="{{route('registrar')}}" method="POST" class="d-flex flex-column align-items-center mt-5">
    <h3>Crie sua Conta</h3>
    <div class="container mt-5 w-50">
        <div class="form-outline mb-4 w-100">
            <input type="email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Nome de usuário</label>
        </div>
        <div class="form-outline mb-4 w-100">
            <input type="email" id="form2Example1" class="form-control" />
            <label class="form-label" for="form2Example1">Email</label>
        </div>
        <div class="form-outline mb-4 w-100">
            <input type="password" id="form2Example2" class="form-control" />
            <label class="form-label" for="form2Example2">Senha</label>
        </div>
        <button type="button" class="btn btn-primary btn-block mb-4 w-100">Cadastrar</button>
    </div>
</form>
</body>
</html>