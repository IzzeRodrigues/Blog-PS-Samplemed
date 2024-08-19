<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{
  public function getUser(Request $request)
  {
    // $user = $request->user();
    // var_dump($request->all());
    //  return redirect()->away('http://localhost/api_blog/login')->with('nome', $request -> nome)->with('senha', $request -> senha);
    $conexao = Http::get('http://localhost/api_blog/login', ['nome' => $request->nome, 'senha' => $request->senha]);
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
}