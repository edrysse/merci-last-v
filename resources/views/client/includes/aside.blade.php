<aside class="sidebar trans-0-4">
    
    <!-- Button Hide sidebar -->
    <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

    <!-- - -->
    <ul class="menu-sidebar p-t-95 p-b-70">
        
        <li class="t-center m-b-13">
            <a href={{ route('clientIndex.index') }} class="txt19">Accueil</a>
        </li>

        <li class="t-center m-b-13">
            <a href={{ route('clientMenu.index') }} class="txt19">Menu</a>
        </li>

        <li class="t-center m-b-13">
            <a href={{ route('clientGalery.index') }} class="txt19">Galerie</a>
        </li>

        <li class="t-center m-b-13">
            <a href={{ route('clientAbout.index') }} class="txt19">à propos</a>
        </li>



        <li class="t-center m-b-33">
            <a href={{ route('clientContact.index') }} class="txt19">Contact</a>
        </li>

        <li class="t-center dropdown">
    <a href="#" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto dropdown-toggle">
        Réservations
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('clientReservation.index') }}" class="dropdown-item">Restaurant</a></li>
        <li><a href="{{ route('Apparetementindex') }}" class="dropdown-item">Appartement</a></li>
    </ul>
</li>
<style>
.dropdown {
    position: relative;
}

.dropdown-toggle {
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    min-width: 160px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 0;
    list-style-type: none;
    z-index: 1000;
}

.dropdown-item {
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
    display: block;
}

.dropdown-item:hover {
    background-color: #f0f0f0;
    color: #000;
}

/* Affiche le sous-menu au survol de l'élément parent */
.dropdown:hover .dropdown-menu {
    display: block;
}

</style>

    </ul>

    <!-- - -->
    <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
        <!-- - -->
        <h4 class="txt20 m-b-33">
            Galerie
        </h4>

        <!-- Gallery -->
        <div class="wrap-gallery-sidebar flex-w">
            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-01.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-01.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-02.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-02.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-03.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-03.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-05.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-05.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-06.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-06.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-07.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-07.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-09.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-09.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-10.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-10.jpg') }} alt="GALLERY">
            </a>

            <a class="item-gallery-sidebar wrap-pic-w" href={{ asset('clientpage/images/photo-gallery-11.jpg') }}
                data-lightbox="gallery-footer">
                <img src={{ asset('clientpage/images/photo-gallery-thumb-11.jpg') }} alt="GALLERY">
            </a>
        </div>
    </div>
</aside>
