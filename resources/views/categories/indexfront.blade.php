<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Categories</h1>
    <div class="list-group">
        @foreach($categories as $category)
            <a href="{{ route('categories.showfront', $category->id) }}" class="list-group-item list-group-item-action">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
</body>
</html>