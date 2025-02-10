<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Processing System</title>
</head>
<body>
    <h1>File Processing System</h1>

    <form action="{{ route('files.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Files</h2>
    <ul>
        @foreach ($files as $file)
            <li>
                <a href="{{ route('files.download', $file->id) }}">{{ $file->name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>