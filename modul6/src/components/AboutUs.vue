<template>
    <section class="about-us">
      <div class="about-content">
        <img src="/images/logo.png" alt="Fire Icon" class="icon-fire" />
        <p>
          Yaa Steak merupakan UMKM bidang food & beverages<br />
          yang terletak di Pujasera D'food City Surabaya.<br />
          Steak merupakan makanan western yang berkonsep kaki lima, <br />
          namun tidak menghilangkan kelas mewahnya.<br />
          Yaa steak memiliki company culture yaitu clan culture <br />
          (kerjasama, komunikasi, bertanggung jawab,<br />
          inisiatif, kerja keras, komitmen, kesepakatan).
        </p>
      </div>
      <div class="about-location">
        <p>
          Bukan hanya enak dan lezat<br />
          tetapi UMKM ini telah <br />
          mendapatkan sertifikat halal.<br />
          Jadi makanan ini cocok untuk <br />
          semua kalangan yang ada.
        </p>
        <img src="/images/logo halal.jpeg" alt="Halal Icon" class="icon-fire" />
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: "AboutUs",
  };
  </script>
  
  <style scoped>
  .about-location {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 50px;
    margin: 20px auto;
    max-width: 800px;
    background-color: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

  </style>