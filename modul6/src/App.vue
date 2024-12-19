<template>
  <div>
    <Header />
    <Carousel />
    <AboutUs />
    <FavoriteMenu />
    <GoogleMaps />
    <Comments />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Carousel from "./components/Carousel.vue";
import AboutUs from "./components/AboutUs.vue";
import FavoriteMenu from "./components/FavoriteMenu.vue";
import GoogleMaps from "./components/GoogleMaps.vue";
import Comments from "./components/Comments.vue";

export default {
  components: {
    Header,
    Carousel,
    AboutUs,
    FavoriteMenu,
    GoogleMaps,
    Comments,
  },
};
</script>

<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    background-color: #ffffff;
}

.logo img {
    height: 50px;
    width: 50px;
    border-radius: 50%;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 100px;
}

nav ul li a {
    color: #333;
    text-decoration: none;
    font-weight: 500;
    padding: 15px 30px;
    border-radius: 19px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.5s ease, color 0.5s ease;
}

nav ul li a:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
}

.icons .icon {
    width: 8px;
    height: 8px;
    margin-left: 5px;
    background-color: #e74c3c;
    border-radius: 50%;
}

/* Carousel */
.carousel {
    text-align: center;
    padding: 40px 0;
}

.carousel-images {
    position: relative;
    width: 90%;
    max-width: 1000px;
    margin: auto;
    display: flex;
    overflow: hidden;
    border-radius: 12px;
}

.carousel-images img {
    width: 100%;
    position: absolute;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    border-radius: 12px;
}

.carousel-images img.active {
    opacity: 1;
    position: relative;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2em;
    color: #555;
    cursor: pointer;
    background: none;
    border: none;
    padding: 10px;
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
}

/* About Us */
.about-us {
    padding: 100px 20px;
    text-align: center;
    background-color: #ffffff;
}

.about-content {
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

.icon-fire {
    width: 200px;
    height: 200px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.icon-fire3 {
    width: 400px;
    height: 400px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.icon-location {
    width: 100px;
    border-radius: 8px;
    margin-bottom: 20px;
}

/* Favorite Menu */
.favorite-menu {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
  text-align: center;
}

.favorite-menu h3 {
  font-size: 2em;
  margin-bottom: 20px;
  color: #333;
}

.menu-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
}

.menu-card {
  width: 250px;
  background-color: #ffffff;
  padding: 15px;
  border: 1px solid #eee;
  border-radius: 12px;
  text-align: center;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
}

.menu-card:hover {
  transform: scale(1.1);
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
}

.menu-card img {
  width: 100%;
  height: auto;
  border-radius: 12px;
}

.menu-card h4 {
  font-weight: bold;
  margin: 10px 0;
  color: #333;
}

.menu-links button {
  background-color: #007bff;
  color: #ffffff;
  margin: 5px;
  padding: 8px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s;
}

.menu-links button:hover {
  background-color: #0056b3;
}

.menu-actions button {
  background-color: #ffc107;
  color: #ffffff;
  margin: 5px;
  padding: 8px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.menu-actions button:hover {
  background-color: #e0a800;
}

.menu-form {
  width: 100%;
  max-width: 600px;
  margin-top: 30px;
  padding: 20px;
  background-color: #f8f9fa;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.menu-form input,
.menu-form button {
  width: 100%;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}

.menu-form button {
  background-color: #28a745;
  color: white;
  cursor: pointer;
  transition: background 0.3s;
}

.menu-form button:hover {
  background-color: #218838;
}

.image-preview {
  margin-top: 10px;
  max-width: 100%;
  max-height: 200px;
  overflow: hidden;
}

.image-preview img {
  width: 100%;
  height: auto;
}
/* Google Maps */
.google-maps {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 30px;
    background-color: #ffffff;
}

.google-maps h3 {
    color: #333;
    margin-bottom: 20px;
}

/* Contact Card */
.contact-card {
    display: flex;
    flex-direction: row;
    position: relative;
    padding: 250px;
    margin-bottom: 80px;
    text-align: center;
}

.contact-content {
    max-width: 500px;
    margin: auto;
    background-color: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.contact-content h2 {
    font-size: 2em;
    margin-bottom: 10px;
}

.contact-content p {
    font-size: 1.1em;
    margin-bottom: 20px;
    color: #000000;
}

.contact-buttons {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.contact-button {
    color: #1a1a1a;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.5s ease, color 0.5s ease;
}

.contact-button.instagram:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.contact-button.whatsapp:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
}

.contact-button.whatsapp {
    background-color: #25D366; /* WhatsApp green */
    color: #fff;
}

.contact-button.instagram {
    background-color: #E1306C; /* Instagram pink */
    color: #fff;
}

.linkkartu{
    color: white;
    text-decoration: none;
}

/* Komentar Section */
.comment {
    padding: 40px 20px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin: 40px auto;
    max-width: 800px;
}

.comment h3 {
    text-align: center;
    font-size: 2em;
    color: #333;
    margin-bottom: 20px;
}

.comment-container {
    max-height: 250px; /* Adjust this value based on the height of your cards */
    overflow-y: auto;
    margin-bottom: 30px;
}

.comment-card {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
}

.comment-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.comment-header h4 {
    font-size: 1.2em;
    color: #333;
    margin: 0;
}

.comment-header .comment-date {
    font-size: 0.9em;
    color: #888;
}

.comment p {
    font-size: 1em;
    color: #555;
    line-height: 1.5;
    margin: 0;
}

/* Comment Form */
.comment-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.comment-input,
.comment-textarea {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 1em;
    outline: none;
    transition: border-color 0.3s;
}

.comment-input:focus,
.comment-textarea:focus {
    border-color: #007bff;
}

.comment-button {
    padding: 10px 15px;
    font-size: 1em;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.comment-button:hover {
    background-color: #0056b3;
}

.comment-actions {
  margin-top: 10px;
}
.edit-button,
.delete-button {
    border: 0px;
  margin-right: 5px;
  cursor: pointer;
}
.edit-button {
  color: blue;
}
.delete-button {
  color: red;
}

/* Footer */
footer {
    text-align: center;
    padding: 20px;
    background-color: #ffffff;
    color: #333;
}

</style>
