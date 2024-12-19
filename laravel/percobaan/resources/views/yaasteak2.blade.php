<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yaa Steak</title>
    <link rel="stylesheet" href="{{ asset('css/yaasteak2.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Yaa Steak Logo">
        </div>
        <nav>
            <ul>
                <li><a href="{{ asset('http://127.0.0.1:8000') }}">Home</a></li>
                <li><a href="menu2.html">Menu</a></li>
                <li><a href="event2.html">Event</a></li>
                <li><a href="contact2.html">Contact</a></li>
            </ul>
        </nav>
        <div class="icons">
            <span class="icon red-dot"></span>
            <span class="icon red-dot"></span>
            <span class="icon red-dot"></span>
        </div>
    </header>

    <!-- Carousel Section -->
    <section class="carousel">
        <div class="carousel-images">
            <img src="images/banner.png" alt="Banner 1" class="active" style="height: 500px;">
            <img src="images/banner2.png" alt="Banner 2" style="height: 500px;">
            <img src="images/banner3.png" alt="Banner 3" style="height: 500px;">
            <button class="carousel-control prev">❮</button>
            <button class="carousel-control next">❯</button>
        </div>
    </section>
    

    <!-- About Us Section -->
    <section class="about-us">
        <div class="about-content">
            <img src="images/logo.png" alt="Fire Icon" class="icon-fire">
            <p>Yaa Steak merupakan UMKM bidang food & beverages<br> yang terletak di Pujasera D'food City Surabaya.<br> Steak merupakan makanan western yang berkonsep kaki lima, <br> namun tidak menghilangkan kelas mewahnya.<br> Yaa steak memiliki company culture yaitu clan culture <br>(kerjasama, komunikasi, beranggung jawab,<br>inisiatif, kerja keras, komitmen, kesepakatan).</p>
        </div>
        <div class="about-location">
            <p>Bukan hanya enak dan lezat<br>tetapi umkm ini telah <br>mendapatkan sertifikat halal.<br>Jadi makanan ini cocok untuk <br> Semua kalangan yang ada. <br> </p>
            <img src="images/logo halal.jpeg" alt="Fire Icon" class="icon-fire">

        </div>
    </section>
        
    <!-- Favorite Menu Section -->
    <section class="favorite-menu">
        <h3>MENU FAVORITE</h3>
        <div class="menu-items">
            @if(isset($menus) && count($menus) > 0)
                @foreach($menus as $menu)
                    <div class="menu-card">
                    <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama_menu }}">
                        <p>{{ $menu->nama_menu }}</p>
                        <button onclick="window.location.href='{{ $menu->link_whatsapp }}'">Order Via Whatsapp</button>
                        <button onclick="window.location.href='{{ $menu->link_gofood }}'">Order Via GoFood</button>
                    </div>
                @endforeach
            @else
                <p>Tidak ada menu favorite saat ini.</p>
            @endif
        </div>
        <a href="menu2.html" class="more-link">Menu Selengkapnya</a>
    </section>


    <section class="google-maps">
        <h3>Our Location</h3>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7915.449130031583!2d112.755442!3d-7.272151!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd15c9a7875%3A0x610115ca4219fbf1!2sJl.%20Gubeng%20Airlangga%20II%2C%20Airlangga%2C%20Kec.%20Gubeng%2C%20Surabaya%2C%20Jawa%20Timur%2060286%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1731542945589!5m2!1sen!2sus"
                width="600" 
                height="450" 
                style="border-radius: 20px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe> 
        </div>
    </section>

    @section('content')
    <section class="comment">
        <h3>Komentar</h3>
        <div class="comment-container">
            @if ($komentars->count() > 0)
                @foreach ($komentars as $komentar)
                    <div class="comment-card">
                        <div class="comment-header">
                            <h4>{{ htmlspecialchars($komentar->nama) }}</h4>
                            <span class="comment-date">{{ $komentar->created_at->format('d-m-Y H:i') }}</span>
                        </div>
                        <p>{{ htmlspecialchars($komentar->isikomentar) }}</p>
                    </div>
                @endforeach
            @else
                <p>Belum ada komentar.</p>
            @endif
        </div>

        <!-- Form untuk menambah komentar -->
        <form action="{{ route('komentar.store') }}" method="POST" class="comment-form">
            @csrf
            <input type="text" placeholder="Nama Anda" class="comment-input" id="nama" name="nama" required>
            <textarea placeholder="Tulis komentar Anda..." class="comment-textarea" id="isikomentar" name="isikomentar" required></textarea>
            <button type="submit" class="comment-button">Kirim Komentar</button>
        </form>
    </section>
    

    <!-- Footer (Placeholder) -->
    <footer>
        <p>© 2024 Yaa Steak. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/yaasteak2.js') }}"></script>
</body>
</html>
