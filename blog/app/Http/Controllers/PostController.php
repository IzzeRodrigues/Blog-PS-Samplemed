<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
// use App\Http\Controllers\Session;
class PostController extends Controller
{
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
