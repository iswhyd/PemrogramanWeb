<template>
    <section class="carousel">
      <div class="carousel-images">
        <img v-for="(image, index) in images" :key="index" :src="image.src" :alt="image.alt" :class="{ active: index === activeIndex }" />
        <button class="carousel-control prev" @click="prevSlide">❮</button>
        <button class="carousel-control next" @click="nextSlide">❯</button>
      </div>
    </section>
  </template>
  
  <script>
  export default {
    name: "Carousel",
    data() {
      return {
        images: [
          { src: "/images/banner.png", alt: "Banner 1" },
          { src: "/images/banner2.png", alt: "Banner 2" },
          { src: "/images/banner3.png", alt: "Banner 3" },
        ],
        activeIndex: 0,
      };
    },
    methods: {
      prevSlide() {
        this.activeIndex = (this.activeIndex + this.images.length - 1) % this.images.length;
      },
      nextSlide() {
        this.activeIndex = (this.activeIndex + 1) % this.images.length;
      },
    },
  };
  </script>
  
  <style scoped>
  /* Tambahkan CSS untuk carousel di sini */
  </style>
  