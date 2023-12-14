<?php

namespace App\Http\Controllers;


use App\Models\File;
use Illuminate\Http\Request; // Import the Request class
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FileController extends Controller

    
{
    public function showUploadForm()
    {
        return view('upload');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,pdf|max:2048',
        ]);

        // $path = $request->file('file')->store('uploads', 'azure');

        $fileDetails = [
            'filename' => $request->file('file')->getClientOriginalName(),
            'uploaded_at' => now(),
            // Add any other fields as needed
        ];

        // Use the File model to insert the file details into the database
        File::create($fileDetails);

        return redirect()->back()->with('message', 'File uploaded successfully.');
    }
}
