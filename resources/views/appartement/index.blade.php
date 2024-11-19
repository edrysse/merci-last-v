@extends('client.layout')

@section('content')
<div class="container">
    <h1 class="title">Nos Chambres</h1>
    <div class="card-container">
        @foreach($rooms as $room)
        <div class="card">
            <img src="{{ asset('upload/img/' . $room->image) }}" alt="{{ $room->name }}">
            <div class="card-info">
                <h3>{{ $room->name }}</h3>
                <p>{{ $room->description }}</p>
                <p class="price">Prix: {{ $room->price }}€ / nuit</p>
                <div class="stars">{{ str_repeat('★', $room->rating) }}{{ str_repeat('☆', 5 - $room->rating) }}</div>
                <p class="extra-info">{{ $room->extra_info }}</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        @endforeach
    </div>

    <div id="reservationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Réservez votre chambre</h2>
            <form action="{{ route('Apparetementstore') }}" method="POST">
                @csrf
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="adresse" placeholder="Adresse">
                <input type="text" name="ville" placeholder="Ville" required>
                <input type="text" name="codePostal" placeholder="Code Postal" required>
                <input type="text" name="telephone" placeholder="Téléphone" required>
                <button type="submit">Confirmer la réservation</button>
            </form>
        </div>
    </div>
</div>

<style>
     * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #fff; /* Fond blanc */
    color: #333; /* Texte en noir */
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 30px auto;
    text-align: center;
}

.title {
    font-size: 2em;
    margin-bottom: 20px;
    color: #c0392b; /* Rouge */
}

.card-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    justify-items: center;
}

.card {
    background-color: #fff;
    border: 2px solid #e6e6e6; /* Bordure gris clair */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 250px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
}

.card-info {
    padding: 15px;
    text-align: left;
}

.card-info h3 {
    font-size: 1.2em;
    color: #c0392b; /* Rouge pour le titre */
    margin-bottom: 10px;
}

.card-info p {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 5px;
}

.price {
    font-weight: bold;
    color: #e67e22; /* Orange pour le prix */
}

.stars {
    color: #ffd700; /* Couleur des étoiles */
}

.extra-info {
    font-size: 0.85em;
    color: #888;
    margin-bottom: 15px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #c0392b; /* Rouge pour le bouton */
    color: #fff;
    border: none;
    border-radius: 5px;
    text-align: center;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #e74c3c; /* Rouge plus clair au survol */
}

@media (max-width: 768px) {
    .card-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .card-container {
        grid-template-columns: 1fr;
    }
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.close {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 24px;
    cursor: pointer;
}

.modal-content form input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.modal-content form button {
    width: 100%;
    padding: 10px;
    background-color: #c0392b; /* Rouge pour le bouton */
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.modal-content form button:hover {
    background-color: #e74c3c; /* Rouge plus clair au survol */
}


</style>

<script>
    // Function to open the modal
    function openModal() {
        document.getElementById("reservationModal").style.display = "flex";
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById("reservationModal").style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById("reservationModal")) {
            closeModal();
        }
    }
</script>

@endsection
