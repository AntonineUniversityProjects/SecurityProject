<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:jpeg,png,pdf|max:2048', // Adjust file types and size
        ]);

        // Process the file and store it in Azure Storage
        $path = $request->file('file')->store('uploads', 'azure');

        // Save additional file details in your database if needed

        return redirect()->back()->with('message', 'File uploaded successfully.');
    }
}

