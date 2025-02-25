<?php

// app/Http/Controllers/AudioController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;

class AudioController extends Controller
{
    public function upload(Request $request)
    {
        $validated = $request->validate([
            'audio' => 'required|mimes:mp3,wav|max:10240',  // Giới hạn định dạng và kích thước file
        ]);

        // Tải lên file âm thanh
        $audioFile = $request->file('audio');
        $audioPath = $audioFile->getRealPath();

        // Upload lên Cloudinary
        $cloudinary = new Cloudinary();
        $uploadResult = $cloudinary->uploadApi()->upload($audioPath, [
            'resource_type' => 'auto', // Tự động xác định loại tài nguyên (âm thanh hoặc hình ảnh)
        ]);

        return response()->json([
            'message' => 'Upload successful',
            'url' => $uploadResult['secure_url'], // URL để truy cập file âm thanh đã tải lên
        ]);
    }
}

