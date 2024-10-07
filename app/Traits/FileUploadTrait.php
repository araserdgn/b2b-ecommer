<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    // Resim yükleyen trait. Traitler sürekli kullanılabilecek yapılardır

    public function uploadImage(Request $request, string $inputName, string $oldPath = null, string $path = '/uploads'): ?string
    {
        try {
            if ($request->hasFile($inputName) && $request->file($inputName)->isValid()) {
                $image = $request->file($inputName);
                $ext = $image->getClientOriginalExtension(); // Yüklenen resim dosyasının uzantısını alır (jpg, png vb.)

                // Unique isim oluşturuyoruz
                $imageName = 'media_' . uniqid() . '.' . $ext; // uniqid => random sayı üretir

                // Dosya yükleme aşaması
                $image->move(public_path($path), $imageName); // Yüklenecek yer ve dosya adı

                // Eski resmi sil
                if ($oldPath && File::exists(public_path($oldPath))) {
                    File::delete(public_path($oldPath));
                }

                return $path . '/' . $imageName; // Yüklenen dosyanın yolu
            }
        } catch (\Exception $e) {
            // Hata durumunda bir hata mesajı döndür
            return null; // Hata durumunda null döndür
        }

        return null; // Dosya yoksa null döndür
    }
}
