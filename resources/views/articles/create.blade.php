
<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('articles.form')
    </form>
