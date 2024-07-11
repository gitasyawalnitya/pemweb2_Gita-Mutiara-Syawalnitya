<?php

namespace App\Http\Controllers;

use App\Models\Post;
use illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PostController extends Controller
{
    //
    public function index(): View
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //kirim data post ke view
        return view('posts.index', compact('posts'));
    }

    public function generatePDF()
    {
        $posts = Post::all();
        $pdf = PDF::loadView('posts.pdf', compact('posts'));
        return $pdf->download('posts.pdf');
    }

    public function view($code): View
    {
        $post = Post::findOrFail($code);
        return view('posts.view', compact('post'));
    }

    public function edit ($code){
        $post = Post::findOrFail($code);
        return view('posts.edit', compact('post'));
    }

    public function login (){
        return view('posts.login');
    }

    public function add (){
        return view('posts.add');
    }

    public function store(Request $request)
    {
        $validate= $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $validate['title'];
        $post->content = $validate['content'];

        if (array_key_exists('image', $validate)){
            $post->image = $validate['image']->store('image', 'public');
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validate['title'];
        $post->content = $validate['content'];

        if ($request->hasFile('image')){
            if ($post->image){
                Storage::delete('public/' . $post->image);

            }
            $post->image = $request->file('image')->store('image', 'public');
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
            if ($post->image){
                Storage::disk('public')->delete($post->image);
            }

            $post->delete();

            return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }

}