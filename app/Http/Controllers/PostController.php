<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);
        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(
            300,
            300
        );
        $image->save();
        auth()
            ->user()
            ->posts()
            ->create([
                'caption' => $data['caption'],
                'image' => $imagePath,
            ]);
        return redirect('/profile/' . auth()->user()->id);
    }
    public function show(\App\Models\Post $post)
    {
        $follows = auth()->user()
            ? auth()
                ->user()
                ->following->contains($post->user->id)
            : false;
        return view('post.show', compact('post', 'follows'));
    }
}
