<h1>Statut de votre inscription</h1>

<p>Bonjour {{ $inscription->user->name }},</p>

<p>Le statut de votre inscription à la formation "{{ $inscription->formation->name }}" a été mis à jour. Le nouveau statut est : {{ $inscription->statut }}.</p>

<p>Merci,</p>
<p>L'équipe de gestion des formations</p>
