<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
    <style>
        /* Add your CSS styles here */
        /* This is a simplified version for demonstration purposes */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-body {
            padding: 20px;
        }

        .text-primary {
            color: #007bff;
        }

        .text-dark {
            color: #333;
        }

        .text-muted {
            color: #666;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

    </style>
</head>

<body>
        <div class="container">
            <div class="row justify-content-center">
                <!-- Article Details Section -->
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-5">
                            <!-- Title -->
                            <h1 class="display-5 mb-4 text-center text-primary">{{ $article->title }}</h1>

                            <!-- Image -->
                            @if($article->image)
                                <div class="text-center mb-4">
                                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded" alt="{{ $article->title }}" style="max-width: 100%; height: auto; border-radius: 5px;">
                                </div>
                            @endif

                            <!-- Article Info -->
                            <div class="row g-3">
                                <!-- Content -->
                                <div class="col-12">
                                    <h5 class="text-dark"><i class="fas fa-info-circle text-primary"></i> Content:</h5>
                                    <p class="text-muted">{{ $article->contenu }}</p>
                                </div>

                                <!-- Published Date -->
                                <div class="col-12">
                                    <h5 class="text-dark"><i class="fas fa-calendar-alt text-primary"></i> Published On:</h5>
                                    <p class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</p>
                                </div>


            </div>
        </div>



    </body>

    </html>
