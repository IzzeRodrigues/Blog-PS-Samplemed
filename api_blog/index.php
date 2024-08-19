<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;  

require './vendor/autoload.php';

$app = new \Slim\App;

$app->get('/','padrao');
$app->get('/pegarLogin', 'getLogin');
$app->get('/login', 'login');

function padrao(Request $request, Response $response, array $args)
{
    $padrao = "teste";
    return $padrao;
}

function getConn() {
    return new PDO('mysql:host=127.0.0.1;dbname=blog_ps;charset=utf8', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
}

function getLogin(Request $request, Response $response, array $args) {
    $html = file_get_contents(__DIR__ . '/../resources/views/login.blade.php');
    $response->getBody()->write($html);
    return $response;
}

function login(Request $request, Response $response, array $args) {
    $usuario = $request->getParsedBody();
    $nome = $usuario['nome'] ?? '';
    $senha = $usuario['senha'] ?? '';

    $conn = getConn();
    $sql = "SELECT * FROM tb_usuario WHERE nm_usuario = :nome AND cd_senha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetchObject();

    return 'funciona';

        if ($result) {
            $response=['situacao' => 'sucesso', 'nome'=>$result->nm_usuario];
            return $response;
        } else {
            
            $response=['situacao' => 'fracasso'];
            return $response;
        }

}

$app->run();
