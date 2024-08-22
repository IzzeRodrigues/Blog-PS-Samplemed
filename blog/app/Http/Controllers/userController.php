<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Session;

class userController extends Controller
{

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate(); 
    $request->session()->regenerateToken();

    return redirect()->route('welcome');
  }

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
       session(['user' => ['nome' => $dados['nome']]]);
      return redirect()->route('welcome', $dados['nome']);
    }  else if ($body['situacao'] == 'fracasso') {
      
      setcookie('alert_message', 'Credenciais inválidas. Tente novamente.', time() + 10, );
      return redirect()->route('login');
    }

  }

  public function setUser(Request $request)
  {
    $dados = [
      'nome' => $request->nome,
      'email' => $request->email,
      'senha' => $request->senha,
    ];

    $conexao = Http::post('http://localhost/blog-ps-samplemed/api_blog/registrar',$dados);
    $body = $conexao->json();

    if ($body['situacao'] == "sucesso"){
      return redirect()->route('login');
    }  else if($body['situacao'] == 'fracasso') {
      setcookie('alert_message1', 'Problema ao registrar. Tente novamente.', time() + 10, );
      return redirect()->route('registrar');
    }
  }

}