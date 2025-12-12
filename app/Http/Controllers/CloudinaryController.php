<?php

namespace App\Http\Controllers;

use App\Models\cloud;
use Illuminate\Http\Request;
use Cloudinary\Api\Upload\UploadApi;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryController extends Controller
{
    public function uploadImage()
    {
        return view('uploadimage');
    }

    public function storeImage(Request $request)
    {
        // Cek Validasi Gambar
        $request->validate([
            'image' => 'required|image|max:2048', // max 2MB
        ]);

        // Upload Gambar ke Cloudinary
        $uploadedFileUrl = (new UploadApi())->upload($request->file('image')->getRealPath(), [
            'folder' => 'sibice',
            'public_id' => pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME),
        ]);

        // Simpan URL Gambar ke Database
        $urlToDatabase = new cloud();
        $urlToDatabase->name = $request->file('image')->getClientOriginalName();
        $urlToDatabase->image_url = ($uploadedFileUrl['secure_url']);
        $urlToDatabase->save();

        // Kembalikan URL Gambar yang diunggah
        return ($uploadedFileUrl['secure_url']);
    }

    public function uploadpdf()
    {
        return view('uploadpdf');
    }

    public function storepdf(Request $request)
    {
        // Cek Validasi PDF
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:5120', // max 5MB
        ]);

        // Upload PDF ke Cloudinary
        $uploadedFileUrl = (new UploadApi())->upload($request->file('pdf')->getRealPath(), [
            'folder' => 'sibice/pdfs',
            'public_id' => pathinfo($request->file('pdf')->getClientOriginalName(), PATHINFO_FILENAME),
            'resource_type' => 'auto',
            'type' => 'upload',
        ]);

        // Simpan URL PDF ke Database
        $urlToDatabase = new cloud();
        $urlToDatabase->name = $request->file('pdf')->getClientOriginalName();
        $urlToDatabase->image_url = ($uploadedFileUrl['secure_url']);;
        $urlToDatabase->save();

        // Kembalikan URL PDF yang diunggah
        return ($uploadedFileUrl['secure_url']);
    }
}
