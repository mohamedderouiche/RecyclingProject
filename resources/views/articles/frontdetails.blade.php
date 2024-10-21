

  
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
                </div>
            </div>
        </div>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px; /* Keep the larger screen size */
            width: 100%;
            margin: 0 auto; /* Center the container horizontally */
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Centering Content */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        /* Title Styles */
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #000;
            margin-bottom: 30px;
        }

        .text-dark {
            color: #333;
        }

        .text-muted {
            color: #777;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Info Section */
        h5 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            line-height: 1.5;
        }

        /* Download Button */
        .download-btn {
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px;
            box-shadow: 0 6px 10px rgba(0, 123, 255, 0.2);
        }

        .download-btn:hover {
            background-color: #0056b3;
        }

        /* Comments Section */
        .comments-section {
            margin-top: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .comments-section h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
        }

        .comment {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .comment p {
            margin: 0;
            font-size: 1rem;
        }

        .comment strong {
            font-weight: bold;
            color: #007bff;
        }

        .comment small {
            display: block;
            margin-top: 5px;
            color: #777;
        }

        /* Comment Form */
        textarea.form-control {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
            resize: vertical;
        }

        button.btn-primary {
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button.btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 2rem;
            }

            h5 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content-wrapper">
            <!-- Centered Title -->
            <h1 class="text-center">{{ $article->title }}</h1>

            <!-- Maximized Image Section -->
            @if($article->image)
            <div class="img-container">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}">
            </div>
            @endif

            <!-- Article Info Section -->
            <div class="info-section">
                <!-- Content Block -->
                <div class="info-block">
                    <h5 class="text-dark"><i class="fas fa-info-circle text-primary"></i> Content:</h5>
                    <p class="text-muted">{{ $article->contenu }}</p>
                </div>

                <!-- Published Date Block -->
                <div class="info-block">
                    <h5 class="text-dark"><i class="fas fa-calendar-alt text-primary"></i> Published On:</h5>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</p>
                </div>
            </div>

            <!-- Download Button -->
            @if($article->pdf)
            <div class="text-center mt-4">
                <a href="{{ route('articles.download', $article->id) }}" class="download-btn">Download Article PDF</a>
            </div>
            @endif
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h3>Comments:</h3>
            @foreach ($article->comments as $comment)
            <div class="comment">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
                @auth
        <form action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PUT')
            <textarea name="content" rows="2" class="form-control" placeholder="Edit your comment">{{ $comment->content }}</textarea>
            <button type="submit" class="btn btn-primary btn-sm">Update</button>
        </form>

        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
        </form>
        @endauth
            </div>
            @endforeach
        </div>

        <!-- Add a Comment -->
        @auth
        <form action="{{ route('comments.store', $article->id) }}" method="POST">
            @csrf
            <textarea name="content" rows="4" class="form-control" placeholder="Leave a comment"></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        @else
        <p>Please <a href="{{ route('login') }}">log in</a> to comment.</p>
        @endauth
    </div>

</body>

    