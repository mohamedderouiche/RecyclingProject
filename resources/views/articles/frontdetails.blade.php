





@extends('products.layoutProduct') <!-- Extending the front layout -->

@section('content')

<body>
    <div class="container mt-5">
        <!-- Article Card -->
        <div class="card">
            <div class="card-body">
                <!-- Centered Title -->
                <h1 class="text-center">{{ $article->title }}</h1>

                <!-- Maximized Image Section -->
                @if($article->image)
                <div class="d-flex justify-content-center img-container">
                    <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid" alt="{{ $article->title }}" width="500" height="500" style="object-fit: cover;">
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
                    <a href="{{ route('articles.download', $article->id) }}" class="btn btn-primary">Download Article PDF</a>
                </div>
                @endif
            </div>
        </div>
        <!-- End of Article Card -->

        <!-- Comments Section -->
        <div class="comments-section mt-4">
            <h3>Comments:</h3>
            @foreach ($article->comments as $comment)
            <div class="comment mb-3">
                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                <small>{{ $comment->created_at->diffForHumans() }}</small>
                @auth
                <!-- Update Comment Form -->
                <form action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <textarea name="content" rows="2" class="form-control mt-1" placeholder="Edit your comment">{{ $comment->content }}</textarea>
                    <button type="submit" class="btn btn-link text-primary mt-1 p-0" title="Update Comment">
                        <i class="fas fa-pencil-alt"></i> <!-- Edit icon -->
                    </button>
                </form>

                <!-- Delete Comment Form -->
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link text-danger mt-1 p-0" onclick="return confirm('Are you sure you want to delete this comment?')" title="Delete Comment">
                        <i class="fas fa-trash-alt"></i> <!-- Trash icon -->
                    </button>
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


@endsection
