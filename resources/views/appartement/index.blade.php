@extends('client.layout')
@section('content')


<div class="container">
    <h1 class="title">Nos Chambres</h1>
    <div class="card-container">
        <!-- Card 1 -->
        <div class="card">
            <img src="{{ asset('upload/img/s1.avif') }}" alt="Chambre 1">
            <div class="card-info">
                <h3>Chambre Deluxe</h3>
                <p>Profitez d'un confort exceptionnel avec vue sur la ville.</p>
                <p class="price">Prix: 80€ / nuit</p>
                <div class="stars">★★★★☆</div>
                <p class="extra-info">WiFi gratuit et petit déjeuner inclus</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="card">
            <img src="{{ asset('upload/img/s2.avif') }}" alt="Chambre 2">
            <div class="card-info">
                <h3>Chambre Standard</h3>
                <p>Un espace chaleureux et accueillant pour vos séjours.</p>
                <p class="price">Prix: 60€ / nuit</p>
                <div class="stars">★★★☆☆</div>
                <p class="extra-info">Climatisation et télévision incluse</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="card">
            <img src="{{ asset('upload/img/s3.avif') }}" alt="Chambre 3">
            <div class="card-info">
                <h3>Chambre Confort</h3>
                <p>Ambiance chaleureuse pour un séjour agréable.</p>
                <p class="price">Prix: 70€ / nuit</p>
                <div class="stars">★★★☆☆</div>
                <p class="extra-info">Télévision et minibar</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="card">
            <img src="{{ asset('upload/img/s4.avif') }}" alt="Chambre 4">
            <div class="card-info">
                <h3>Suite Exécutive</h3>
                <p>Luxueuse suite avec salon privé.</p>
                <p class="price">Prix: 120€ / nuit</p>
                <div class="stars">★★★★★</div>
                <p class="extra-info">Salle de bain en marbre et jacuzzi</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 5 -->
        <div class="card">
            <img src="{{ asset('upload/img/s5.avif') }}" alt="Chambre 5">
            <div class="card-info">
                <h3>Chambre Économique</h3>
                <p>Confort essentiel à un prix attractif.</p>
                <p class="price">Prix: 50€ / nuit</p>
                <div class="stars">★★☆☆☆</div>
                <p class="extra-info">Salle de bain commune</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 6 -->
        <div class="card">
            <img src="{{ asset('upload/img/s6.avif') }}" alt="Chambre 6">
            <div class="card-info">
                <h3>Chambre Supérieure</h3>
                <p>Vue magnifique sur le parc.</p>
                <p class="price">Prix: 90€ / nuit</p>
                <div class="stars">★★★★☆</div>
                <p class="extra-info">Balcon privé</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 7 -->
        <div class="card">
            <img src="{{ asset('upload/img/s7.avif') }}" alt="Chambre 7">
            <div class="card-info">
                <h3>Suite Présidentielle</h3>
                <p>Expérience unique avec vue panoramique.</p>
                <p class="price">Prix: 200€ / nuit</p>
                <div class="stars">★★★★★</div>
                <p class="extra-info">Salle de gym privée et spa</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 8 -->
        <div class="card">
            <img src="{{ asset('upload/img/s8.avif') }}" alt="Chambre 8">
            <div class="card-info">
                <h3>Chambre Familiale</h3>
                <p>Idéale pour les familles avec enfants.</p>
                <p class="price">Prix: 110€ / nuit</p>
                <div class="stars">★★★★☆</div>
                <p class="extra-info">Espace de jeux pour enfants</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
        <!-- Card 9 -->
        <div class="card">
            <img src="{{ asset('upload/img/s9.avif') }}" alt="Chambre 9">
            <div class="card-info">
                <h3>Studio</h3>
                <p>Compact et fonctionnel pour de courts séjours.</p>
                <p class="price">Prix: 55€ / nuit</p>
                <div class="stars">★★★☆☆</div>
                <p class="extra-info">Coin cuisine</p>
                <button class="btn" onclick="openModal()">Réserver</button>
            </div>
        </div>
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
