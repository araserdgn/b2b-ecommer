<?php

    namespace App\Traits;

use Illuminate\Http\Request;
use File;


    trait FileUploadTrait { // Resim yükleyen trait. Traitler sürekli kullanılabilecek yapılardır

        public function uploadImage(Request $request, $inputName, $oldPath=null, $path='/uploads') {

            if($request->hasFile($inputName)) {
                $image = $request->{$inputName};
                $ext = $image->getClientOriginalExtension(); // yüklenen resim dosyasının uzantısını alır *jpg,png gibi

                // Unique isim olusturuyoruz
                $imageName = 'media_'. uniqid(). '.'.$ext; //uniqid => random sayı üretir

                //Dosya yükleme aşaması
                $image->move(public_path($path), $imageName); // path(yüklenecek yer) ve yüklenecek dosya

                if($oldPath && File::exists(public_path($oldPath))) {
                    File::delete($oldPath);
                }

                // /uploads/media_5415.png tarzında bir çıktı döncek
                return $path.'/'.$imageName;
            }

        }

    }
