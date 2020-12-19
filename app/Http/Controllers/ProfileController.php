<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $follows = auth()->user()
            ? auth()
                ->user()
                ->following->contains($user->id)
            : false;
        return view('profils.index', compact('user', 'follows'));
    }
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profils.edit', compact('user'));
    }
    public function show(User $user)
    {
        $users = User::all();
        $profiles = \App\Models\Profile::whereNotIn('user_id', [$user->id])
            ->latest()
            ->paginate(5);
        return view('profils.show', compact('user', 'profiles'));
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'url',
            'image' => '',
        ]);
        if (request('image')) {
            // $imagePath = request('image')->store('profile', 'public');
            $file = request('image');
            $filename = $file->getClientOriginalName();
            $image = Image::make($file);
            dd(public_path("storage/{$filename}"));
            //$image->save(public_path("storage/{$filename}"));
            $imageArray = ['image' => $filename];
        }
        $user->profile->update(array_merge($data, $imageArray ?? []));
        return view('profils.index', compact('user'));
    }
}
