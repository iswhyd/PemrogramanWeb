<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yaa Steak</title>
    <link rel="stylesheet" href="../css/yaasteak2.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo.png" alt="Yaa Steak Logo">
        </div>
        <nav>
            <ul>
                <li><a href="yaasteak2.blade.php">Home</a></li>
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
            <img src="banner.png" alt="Banner 1" class="active" style="height: 500px;">
            <img src="banner2.png" alt="Banner 2" style="height: 500px;">
            <img src="banner3.png" alt="Banner 3" style="height: 500px;">
            <button class="carousel-control prev">❮</button>
            <button class="carousel-control next">❯</button>
        </div>
    </section>
    

    <!-- About Us Section -->
    <section class="about-us">
        <div class="about-content">
            <img src="logo.png" alt="Fire Icon" class="icon-fire">
            <p>Yaa Steak merupakan UMKM bidang food & beverages<br> yang terletak di Pujasera D'food City Surabaya.<br> Steak merupakan makanan western yang berkonsep kaki lima, <br> namun tidak menghilangkan kelas mewahnya.<br> Yaa steak memiliki company culture yaitu clan culture <br>(kerjasama, komunikasi, beranggung jawab,<br>inisiatif, kerja keras, komitmen, kesepakatan).</p>
        </div>
        <div class="about-location">
            <p>Bukan hanya enak dan lezat<br>tetapi umkm ini telah <br>mendapatkan sertifikat halal.<br>Jadi makanan ini cocok untuk <br> Semua kalangan yang ada. <br> </p>
            <img src="logo halal.jpeg" alt="Fire Icon" class="icon-fire">

        </div>
    </section>
    
    <!-- Favorite Menu Section -->
    <section class="favorite-menu">
        <h3>MENU FAVORITE</h3>
        <div class="menu-items">
            <a class="linkkartu" href="detailmenu.html">
                <div class="menu-card">
                    <img src="promo.png" alt="Menu Item">
                    <p>PROMO 40%</p>
                    <button onclick="window.location.href='https://wa.me/+6285975305091?text=Hallo%20Yaa%20Steak%2C%20Saya%20Ingin%20Membeli%20Paket%20Promo%2040%20Persen-nya'">Order Via Whatsapp</button>
                    <button onclick="window.location.href='https://gofood.link/a/KZgXzH7'">Order Via GoFood</button>
                </div>
            </a>
            <div class="menu-card">
                <img src="promo.png" alt="Menu Item">
                <p>PROMO 40%</p>
                <button onclick="window.location.href='http://wa.me/+6285975305091?text=Hallo%20Yaa%20Steak%20%2C%20Saya%20Ingin%20Membeli%20Paket%20Promo%2040%20Persen-nya'">Order Via Whatsapp</button>
                <button onclick="window.location.href='https://gofood.link/a/KZgXzH7'">Order Via GoFood</button>
            </div>
            <div class="menu-card">
                <img src="promo.png" alt="Menu Item">
                <p>PROMO 40%</p>
                <button onclick="window.location.href='http://wa.me/+6285975305091?text=Hallo%20Yaa%20Steak%20%2C%20Saya%20Ingin%20Membeli%20Paket%20Promo%2040%20Persen-nya'">Order Via Whatsapp</button>
                <button onclick="window.location.href='https://gofood.link/a/KZgXzH7'">Order Via GoFood</button>
            </div>
            <!-- Duplicate menu-card divs as needed -->
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

    <section class="comment">
        <h3>Komentar</h3>
        <div class="comment-container">
            <!-- Display existing comments -->
            <?php
            require 'koneksi.php';

            // Ambil data komentar dari database
            $sql = "SELECT nama, isikomentar, tanggal FROM komentar ORDER BY tanggal DESC";
            $result = mysqli_query($conn, $sql);

            // Display existing comments
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="comment-card">';
                    echo '<div class="comment-header">';
                    echo '<h4>' . htmlspecialchars($row["nama"]) . '</h4>';
                    echo '<span class="comment-date">' . htmlspecialchars($row["tanggal"]) . '</span>';
                    echo '</div>';
                    echo '<p>' . htmlspecialchars($row["isikomentar"]) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Belum ada komentar.</p>';
            }
            ?>
        </div>

        <!-- Comment form -->
        <form action="komentar.php" method="post" class="comment-form">
            <input type="text" placeholder="Nama Anda" class="comment-input" id="nama" name="nama" required>
            <input placeholder="Tulis komentar Anda..." class="comment-textarea" id="isikomentar" name="isikomentar" required></input>
            <button type="submit" class="comment-button">Kirim Komentar</button>
        </form>
    </section>
    

    <!-- Footer (Placeholder) -->
    <footer>
        <p>© 2024 Yaa Steak. All rights reserved.</p>
    </footer>

    <script src="../js/yaasteak2.js"></script>
</body>
</html>
