<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,pdf|max:2048',        ]);

        $file = $request->file('file');
        $fileDetails = [
            'filename' => $file->getClientOriginalName(),
            'uploaded_at' => now(),
            
        ];

        // Use the File model to insert the file details into the database
        File::create($fileDetails);

        // Scan the file for malware using VirusTotal API
        $apiKey = 'b47d3613baca43c7e7bc45c841d15b8ba9abca75bd6bcaace1b7f42d63078297';

        $response = Http::asMultipart()
            ->withHeaders([
                'x-apikey' => $apiKey,
            ])
            ->attach('file', file_get_contents($file->getRealPath()), $file->getClientOriginalName())
            ->post('https://www.virustotal.com/api/v3/files');

        // Ensure the response is successful before trying to decode it
        if ($response->successful()) {
            $result = $response->json();

            // Check if the response has the expected structure
            if (isset($result['data']['attributes']['last_analysis_stats']['malicious']) && $result['data']['attributes']['last_analysis_stats']['malicious'] === 0) {
                // File is clean, proceed as usual
                return redirect()->back()->with('message', 'File uploaded successfully.');
            } else {
                // File is flagged by antivirus engines, handle accordingly
                // Also, you might want to notify the user that the file contains malware.
                Storage::delete($file->path());
                return redirect()->back()->with('message', 'File contains malware and has been rejected.');
            }
        } else {
            // Handle the case where the API request was not successful
            return redirect()->back()->with('message', 'Error occurred while scanning the file.');
        }
    }
}
