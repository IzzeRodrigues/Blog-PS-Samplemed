<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;  

require './vendor/autoload.php';

$app = new \Slim\App;

$app->get('/','padrao');
$app->get('/posts/{id}', 'getPosts');
$app->post('/login', 'login');
$app->post('/pegarLogin', 'getLogin');


function padrao(Request $request, Response $response, array $args)
{
    $padrao = "teste";
    return $padrao;
}

function getConn() {
    return new PDO('mysql:host=127.0.0.1;dbname=blog_ps;charset=utf8', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
}

function getPosts(Request $request, Response $response, array $args) {
    $id = $args['id'] ?? '';
    $id = (int)$id;
    $conn = getConn();

    $sql = "SELECT * FROM tb_posts WHERE id_post = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam('id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $post = $stmt->fetchObject();

    // var_dump($id);
    // var_dump($post);

    if ($post) {
        $response->getBody()->write(json_encode($post));
        return $response->withHeader('Content-Type', 'application/json');
    } else {
        $response->getBody()->write(json_encode(['situacao' => 'fracasso']));
        return $response->withHeader('Content-Type', 'application/json');
    }

    
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

        if ($result) {
            $resposta=['situacao' => 'sucesso', 'nome'=>$result->nm_usuario];
            $response->getBody()->write(json_encode($resposta));
            return $response->withHeader('Content-Type', 'application/json');
        } else {
            
            $resposta=['situacao' => 'fracasso'];
            $response->getBody()->write(json_encode($resposta));
            return $response->withHeader('Content-Type', 'application/json');
        }
        
}

$app->run();
