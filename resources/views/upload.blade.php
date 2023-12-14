<!-- resources/views/upload.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h2>Upload a File</h2>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{ route('upload.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".jpeg, .png, .pdf" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
