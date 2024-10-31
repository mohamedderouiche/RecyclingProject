@extends('formations.layoutFront') <!-- Extending the layout -->
@section('content')

<style>
    .table-hover tbody tr:hover {
        background-color: #f8f9fa; /* Couleur de fond au survol */
    }

    .table td, .table th {
        text-align: center; /* Centre le texte par défaut */
    }

    .table td {
        vertical-align: middle; /* Centre verticalement le contenu des cellules */
    }

    .badge {
        font-weight: bold;
    }
</style>

<div class="container-xxl py-5">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow p-3">
                <div class="container">
                    <h2>Mes Inscriptions</h2>

                    @if ($inscriptions->isEmpty())
                        <p>Vous n'avez aucune inscription pour le moment.</p>
                    @else
                        <table class="table table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nom de la Formation</th>
                                    <th>Date d'inscription</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptions as $inscription)
                                    <tr>
                                        <td style="font-weight: 600;">{{ $inscription->formation->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inscription->date_inscription)->format('d/m/Y') }}</td>
                                        <td>
                                            @if($inscription->statut === 'en cours')
                                                <span class="badge bg-warning text-dark">En cours</span>
                                            @elseif($inscription->statut === 'acceptée')
                                                <span class="badge bg-success">Acceptée</span>
                                            @elseif($inscription->statut === 'refusée')
                                                <span class="badge bg-danger">Refusée</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Formulaire pour supprimer une inscription -->
                                            <form action="{{ route('inscriptions.destroy', $inscription->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?');" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link p-0" title="Supprimer">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
