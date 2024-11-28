@extends('layout')

@section('content')
    <h1>Créer un Nouvel Appartement</h1>

    <form action="{{ route('appartements.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Afficher les erreurs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Champ Nom -->
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
    @error('nom')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Champ Description -->
    <label for="description">Description :</label>
    <textarea id="description" name="description" value="{{ old('description') }}" required></textarea>
    @error('description')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Champ Image -->
    <label for="image">Image (optionnelle) :</label>
    <input type="file" id="image" name="image" accept="image/*">
    @error('image')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Champ Prix -->
    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" value="{{ old('prix') }}" required>
    @error('prix')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Champ Étoiles -->
    <label for="etoiles">Étoiles (sur 5) :</label>
    <input type="number" id="etoiles" name="etoiles" min="1" max="5" value="{{ old('etoiles', 3) }}">
    @error('etoiles')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Champ Informations Supplémentaires -->
    <label for="extra_info">Informations Supplémentaires :</label>
    <input type="text" id="extra_info" name="extra_info" value="{{ old('extra_info') }}">
    @error('extra_info')
        <span class="error">{{ $message }}</span>
    @enderror

    <!-- Bouton de Soumission -->
    <button type="submit" class="btn">Créer</button>
</form>

<style>
        /* Styles généraux */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4; /* Fond clair */
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin-top: 30px;
    color: #ff3b30; /* Couleur rouge */
    font-size: 2em;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff; /* Fond blanc */
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

label {
    font-size: 1em;
    margin-bottom: 8px;
    display: block;
    color: #333; /* Couleur noire pour les labels */
}

input[type="text"],
textarea,
input[type="number"],
input[type="file"],
button {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc; /* Bordure gris clair */
    box-sizing: border-box;
}

textarea {
    resize: vertical;
    height: 150px;
}

button {
    background-color: #ff3b30; /* Bouton rouge */
    color: white;
    font-size: 1.1em;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #d02f28; /* Rouge plus foncé au survol */
}

/* Champs d'entrée spécifiques */
input[type="file"] {
    border: 1px dashed #ccc; /* Bordure en pointillés pour le champ de fichier */
}

input[type="number"] {
    width: 100px;
}

/* Ajout d'un espacement et amélioration de la mise en page */
form > div {
    margin-bottom: 15px;
}

form > div:last-child {
    margin-bottom: 0;
}

/* Messages de succès et d'erreur */
.success-message {
    color: green;
    font-size: 1.2em;
    text-align: center;
    margin-top: 20px;
}

.error-message {
    color: red;
    font-size: 1em;
    text-align: center;
    margin-top: 20px;
}


    </style>
@endsection
