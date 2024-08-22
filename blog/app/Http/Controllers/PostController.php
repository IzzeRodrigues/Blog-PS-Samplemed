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

}
