<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index() {
        $files = File::all();
        return view('files.index', compact('files'));
    }

    public function upload(Request $request) {
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        $uploadedFile = File::create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => $file->getClientMimeType(),
        ]);

        Log::info('File uploaded: ' . $uploadedFile->name);

        return redirect()->route('files.index')->with('success', 'File uploaded');
    }

    public function download($id) {
        $file = File::findOrFail($id);
        return Storage::download($file->path, $file->name);
    }
}
