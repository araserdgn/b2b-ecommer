<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfilController extends Controller
{

    public function index(): View {
        return view('admin.profile.profile-index');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Kullanıcıyı bul
        $user = Auth::user();

        // Verileri güncelle
        $user->name = $request->name;
        $user->email = $request->email;
        $user->vergi_no = $request->vergi_no;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->il = $request->il;
        $user->website = $request->website;
        $user->x_link = $request->x_link;
        $user->facebook = $request->facebook;
        $user->insta = $request->insta;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'uploads'); // 'public' diskine yükle
            $user->avatar = $avatarPath; // Kullanıcı modelindeki avatar alanına kaydet
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}

