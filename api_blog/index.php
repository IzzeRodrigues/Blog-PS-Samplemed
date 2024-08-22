<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;  

require './vendor/autoload.php';

$app = new \Slim\App;

$app->get('/','padrao');
$app->get('/posts', 'getPosts');
$app->post('/login', 'login');
$app->post('/pegarLogin', 'getLogin');
$app->post('/registrar', 'setUser');

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
    $sql = "SELECT nm_post, img_post, dt_post, nm_usuario  FROM tb_posts INNER JOIN tb_usuario ON tb_posts.cd_usuario=tb_usuario.id_usuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $post = $stmt->fetchAll();
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
function setUser(Request $request, Response $response, array $args){
    $usuario = $request->getParsedBody();
        $nome = $usuario['nome'] ?? '';
        $senha = $usuario['senha'] ?? '';
        $email = $usuario['email'] ?? '';
        $conn = getConn();
        $sql = 'SELECT nm_usuario FROM tb_usuario WHERE nm_usuario =:nome';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->execute();
        $result = $stmt->fetchObject();
        if (!$result) {
            $sql = "INSERT INTO tb_usuario(nm_usuario, nm_email, cd_senha, img_perfil) VALUES('$nome', '$email','$senha', '')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resposta=['situacao' => 'sucesso'];
            $response->getBody()->write(json_encode($resposta));
            return $response->withHeader('Content-Type', 'application/json');
        }
        else{
            $resposta=['situacao' => 'fracasso'];
            $response->getBody()->write(json_encode($resposta));
            return $response->withHeader('Content-Type', 'application/json');
        }
       
}

$app->run();
