<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class userController extends Controller
{
  public function getUser(Request $request)
  {
    $dados = [
      'nome' => $request->nome,
      'senha' => $request->senha,
    ];
    $conexao = Http::post('http://localhost/blog-ps-samplemed/api_blog/login', $dados);
    $body = $conexao->json();
    if ($body['situacao'] == "sucesso")
    {
      session_start();
      $_SESSION['user'] = [
       $dados['nome']
      ];
      return redirect()->route('welcome', $dados['nome']);
    }  else if ($body['situacao'] == 'fracasso') {
      setcookie('alert_message', 'Credenciais inválidas. Tente novamente.', time() + 10, );
      return redirect()->route('login');
    }

  }
  public function getPosts()
  {
    $response = Http::get('http://localhost/blog-ps-samplemed/api_blog/posts');
    $posts = $response->json();
    dd($posts);
    if ($response->successful()) {
      return view('welcome', ['posts' => $posts]);
    } 
    else {
      return redirect('/')->route('welcome')->with('error', 'Não foi possível carregar os posts.');
    }
  }
}