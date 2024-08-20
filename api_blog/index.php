<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;  

require './vendor/autoload.php';

$app = new \Slim\App;

$app->get('/','padrao');
$app->get('/login', 'login');
$app->get('/posts', 'getPosts');

function padrao(Request $request, Response $response, array $args)
{
    $padrao = "teste";
    return $padrao;
}

function getConn() {
    return new PDO('mysql:host=127.0.0.1;dbname=blog_ps;charset=utf8', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
}

function getPosts(Request $request, Response $response, array $args) {
    $conn = getConn();
    $sql = "SELECT * FROM tb_posts";
    $stmt = $conn->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $response->getBody()->write(json_encode($posts));
    return $response->withHeader('Content-Type', 'application/json');
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

        if ($result) {
            $response=['situacao' => 'sucesso', 'nome'=>$result->nm_usuario];
            return $response;
        } else {
            
            $response=['situacao' => 'fracasso'];
            return $response;
        }
}

$app->run();
