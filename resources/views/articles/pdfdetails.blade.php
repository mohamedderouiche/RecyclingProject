<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff; /* Ensure PDF has a white background */
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }

        .text-muted {
            color: #666;
            line-height: 1.6;
        }

        h3 {
            color: #007bff;
            margin-top: 30px;
        }

        /* Image Styles for PDF */
        .img-fluid {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Add some shadow to the image */
        }

        /* Content Alignment */
        .content {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Title -->
        <h1>{{ $article->title }}</h1>

        <!-- Article Image -->
        @if($article->image)
        <div class="text-center">
            <img src="{{ public_path('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}">
        </div>
        @endif

        <!-- Article Content -->
        <h3>Content:</h3>
        <p class="text-muted content">{{ $article->contenu }}</p>

        <!-- Published Date -->
        <h3>Published On:</h3>
        <p class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</p>
    </div>
</body>

</html>
