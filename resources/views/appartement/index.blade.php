@extends('client.layout')

@section('content')
@include('client.includes.aside')
<base href="/public">
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15"
    style="background-image: url(clientpage/images/bg-title-page-03.jpg);">
    <div style="    display: flex;
        flex-direction: column;
        align-items: center;">
            <h2 class="tit6 t-center">
                restaurant
            </h2>

            <div class="mb-4" >
                {{-- Merci Laayoune --}}
                <img class="mercilogo-autre"  src="clientpage/images/MERCI_IMG/LOGO/Logo-Merci-b1.png" alt="" >
            </div>

            <div style="    display: flex;
            align-items: center;">
                <a href="https://www.facebook.com/mercilaayoune"><img src="clientpage/images/MERCI_IMG/social-media-merci/facebook-app-symbol-merci.png" alt="" width="22px"></a>
                <a href="https://www.instagram.com/mercilaayoune1"><img class="ml-2" src="clientpage/images/MERCI_IMG/social-media-merci/instagram-merci.png" alt="" width="22px"></a>
                <a href="https://www.tiktok.com/@mercilaayoune"><img class="ml-2" src="clientpage/images/MERCI_IMG/social-media-merci/tik-tok-merci.png" alt="" width="22px"></a>
                <a href="https://t.snapchat.com/Df0EWYBp"><img class="ml-2" src="clientpage/images/MERCI_IMG/social-media-merci/snapchat.png" alt="" width="22px"></a>
                <a href="https://shorturl.at/cnrt1"><img class="ml-2" src="clientpage/images/MERCI_IMG/social-media-merci/pin-merci.png" alt="" width="22px"></a>
            </div>

    </div>
</section>


<div class="container">
    <div class="title-section-ourmenu t-center m-b-22">
        <span class="tit2 t-center">Découvrir</span>
        <h3 class="tit5 t-center m-t-2">Notre Chambres</h3>
    </div>

    <div class="card-container">
        @foreach($rooms as $room)
        <form action="{{secure_url( route('appartement.appartementValid', ['id' => $room->id]) )}}" method="GET">
            @csrf
            <div class="card">
                <img src="{{ secure_asset('storage/'.$room->image) }}" alt="{{ $room->nom }}">
                <div class="card-info">
                    <h3>{{ $room->nom }}</h3>
                    <p>{{ $room->description }}</p>
                    <p class="price">Prix: {{ $room->prix }}€ / nuit</p>
                    <div class="stars">
                        {{ str_repeat('★', $room->etoiles) }}
                        {{ str_repeat('☆', 5 - $room->etoiles) }}
                    </div>
                    <p class="extra-info">{{ $room->extra_info }}</p>
                    <input type="hidden" name="price" value="{{ $room->prix }}">
                    <button class="btn" type="submit">Réserver</button>
                </div>
            </div>
        </form>
        @endforeach
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
    width: 100%;
    max-width: 1200px;
    margin: 0 auto; /* لتوسيط الحاوية */
    text-align: center;
}


.title {
    font-size: 2em;
    margin-bottom: 20px;
    color: #c0392b; /* Rouge */
}

.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* استجابة ديناميكية */
    gap: 15px;
    justify-content: center; /* لتوسيط الكاردات */
}



.card {
    background-color: #fff;
    border: 2px solid #e6e6e6; /* Bordure gris clair */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 80%;
    transition: transform 0.3s, box-shadow 0.3s;
}
.card {
    width: 100%; /* تأكد أن الكارد يملأ العمود */
    max-width: 350px; /* حدد عرضاً أقصى مناسباً */
    margin: 0 auto; /* توازن الهوامش لتوسيطها */
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
        grid-template-columns: 1fr; /* كارد واحد لكل صف */
        width: 100%; /* لضمان التمركز */
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .card-container {
        grid-template-columns: 1fr;
        gap: 10px; /* قلل الفجوة للشاشات الصغيرة */
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
    function openModal() {
        document.getElementById("reservationModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("reservationModal").style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == document.getElementById("reservationModal")) {
            closeModal();
        }
    }
</script>

@endsection
