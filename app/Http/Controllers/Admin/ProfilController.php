<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfilController extends Controller
{

    public function index(): View {
        $user = Auth::user(); // Auth::user() metodu ile auth'deki kullanıcıyı alır
        return view('admin.profile.profile-index', compact('user'));
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
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName(); // Kullanıcının yüklediği orijinal dosya adı
            $file->move(public_path('default'), $filename); // Dosyayı public/default klasörüne taşı
            $user->avatar = 'default/' . $filename; // Veritabanına kaydedilecek yol
        }
        $user->save();

        return redirect()->back()->with('success', 'Güncelleme işlemi başarılı.');
    }

    public function passwordUpdate(Request $request): RedirectResponse {
        $request->validate([
            'password' => ['required', 'min:6','confirmed']
        ]);

        $user=Auth::user();
        $user->password = bcrypt($request->password); //hash sifreleme
        $user->save();

        return redirect()->back()->with('success', 'Sifre güncelleme işlemi başarılı.');
    }
}

