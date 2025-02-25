<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SongController extends Controller
{
    public function index()
    {
        return response()->json(Song::all());
    }

    public function show($id)
    {
        return response()->json(Song::findOrFail($id));
    }

    public function store(Request $request)
{
    // In ra tất cả dữ liệu để kiểm tra
    Log::info($request->all());

    $request->validate([
        'title' => 'required|string|max:255',
        'artist' => 'required|string|max:255',
        'album' => 'nullable|string|max:255',
        'cover_image' => 'required|url',
        'audio_url' => 'required|url',
    ]);

    // Thêm bài hát mới vào cơ sở dữ liệu
    $song = new Song();
    $song->title = $request->title;
    $song->artist = $request->artist;
    $song->album = $request->album;
    $song->cover_image = $request->cover_image;
    $song->audio_url = $request->audio_url;
    $song->save();

    return response()->json($song, 201);
}

}

