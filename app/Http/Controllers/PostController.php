<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('idUser', Auth::user()->id)->get();
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('createPost');
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'publication_date' => date('Y-m-d H:i:s'),
            'idUser' => Auth::user()->id
        ]);

        return redirect()->route('dashboard');
    }

    public function home()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function import()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://sq1-api-test.herokuapp.com/posts');
        $contents = json_decode($response->getBody(), true);

        foreach ($contents['data'] as $post) {
            $postt = Post::create([
                'title' => $post['title'],
                'description' => $post['description'],
                'publication_date' => $post['publication_date'],
                'idUser' => Auth::user()->id
            ]);
        }

        return redirect()->route('dashboard');
    }

}
