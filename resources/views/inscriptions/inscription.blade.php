@extends('formations.layoutFront') <!-- Extending the layout -->
@section('content')

<div class="container-xxl py-5">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow p-3">
                <h2 class="text-center mb-4">Inscription : {{ $formation->name }}</h2>

                @if(session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
                            myModal.show();
                        });
                    </script>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('inscription.store', $formation->id) }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prénom" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Votre email" required>
                    </div>

                    <input type="hidden" name="statut" value="en cours"> <!-- Statut par défaut -->

                    <div class="d-grid my-3">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
