<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <h1>File Upload</h1>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".jpeg, .png, .pdf" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
