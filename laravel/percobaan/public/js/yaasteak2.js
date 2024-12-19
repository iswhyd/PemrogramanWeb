document.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('.carousel-images img');
    let currentIndex = 0;
    let interval;

    // Menyembunyikan semua gambar kecuali gambar yang sedang aktif
    function showImage(index) {
        images.forEach((img, i) => {
            img.classList.toggle('active', i === index);
        });
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % images.length;
        showImage(currentIndex);
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage(currentIndex);
    }

    document.querySelector('.next').addEventListener('click', () => {
        clearInterval(interval); // Hentikan autoplay saat tombol diklik
        nextImage();
        startAutoSlide(); // Restart autoplay
    });

    document.querySelector('.prev').addEventListener('click', () => {
        clearInterval(interval); // Hentikan autoplay saat tombol diklik
        prevImage();
        startAutoSlide(); // Restart autoplay
    });

    function startAutoSlide() {
        interval = setInterval(nextImage, 3000); // Ganti gambar setiap 3 detik
    }

    // Tampilkan gambar pertama dan mulai autoplay saat halaman dimuat
    showImage(currentIndex);
    startAutoSlide();
});
