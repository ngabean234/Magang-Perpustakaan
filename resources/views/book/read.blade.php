<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title>Baca Buku - {{ $book->judul }}</title>
</head>
<body>
    <embed 
        src="{{ asset('filebook/' . $book->file_path) }}"
        type="application/pdf"
        width="100%"
        height="745px"
    />
</body>
</html>