<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
// use App\Http\Controllers\Session;
class PostController extends Controller
{
  public function getPosts(Request $request)
{
    $postId = $request->input('id');
    $conexao = Http::get('http://localhost/blog-ps-samplemed/api_blog/posts/' . $postId);
    $body = $conexao->json();

    dd($body);

    if ($conexao->successful() && !empty($body)) {
            session_start();
            session(['post' => [
              'usuario' => $body['nm_usuario'],
              'descricao' => $body['nm_post'],
              'img' => $body['img_post'],
              'data' => $body['dt_post'],
          ]]);
          return redirect()->route('welcome');
        }  
     else {
        setcookie('alert_message', 'Não foi possível obter os dados do post. Tente novamente.', time() + 10);
        return redirect()->route('welcome');
    }
}
public function setPost(Request $request){
  {
    $dados = [
      'nome' => $request->nome,
      'img' => $request->img,
      'desc' => $request->desc,
    ];

    $conexao = Http::post('http://localhost/blog-ps-samplemed/api_blog/postar',$dados);
    $body = $conexao->json();
    // dd($body);
    if ($body['situacao'] == "sucesso"){
      return redirect()->route('welcome');
    }  else if($body['situacao'] == 'fracasso') {
      setcookie('alert_message1', 'Problema ao registrar. Tente novamente.', time() + 10, );
      return redirect()->route('welcome');
    }
  }
}

}
