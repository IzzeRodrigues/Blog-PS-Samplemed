<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{
  public function getUser(Request $request)
  {
    $conexao = Http::get('http://localhost/blog-ps-samplemed/api_blog/login', ['nome' => $request->nome, 'senha' => $request->senha]);
    $resposta = $conexao->json();
    var_dump($resposta);
    if ($resposta['situacao'] == 'sucesso') {
      session_start();
      $_SESSION['user'] = [
        'name' => $resposta->nome
      ];
      return redirect()->route('/');
    } else if ($resposta['situacao'] == 'fracasso') {
      setcookie('alert_message', 'Credenciais inválidas. Tente novamente.', time() + 10, '/');
      return redirect()->route('/');
    }
  }
  public function getPosts()
  {
       $response = Http::get('http://localhost/blog-ps-samplemed/api_blog/posts');
       $posts = $response->json();
   
       if ($response->successful()) {
         return view('posts', ['posts' => $posts]);
       } else {
         return redirect()->route('home')->with('error', 'Não foi possível carregar os posts.');
       }
  }
}