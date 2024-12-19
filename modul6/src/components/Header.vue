<template>
    <header>
      <div class="logo">
        <img src="/images/logo.png" alt="Yaa Steak Logo">
      </div>
      <nav>
        <ul>
          <li><router-link to="/">Home</router-link></li>
          <li><router-link to="/detailmenu.html">Menu</router-link></li>
          <li><router-link to="/event">Event</router-link></li>
          <li><router-link to="/contact">Contact</router-link></li>
        </ul>
      </nav>
      <div class="icons">
        <span class="icon red-dot"></span>
        <span class="icon red-dot"></span>
        <span class="icon red-dot"></span>
      </div>
    </header>
  </template>
  
  <script>
  export default {
    name: "Header",
  };
  </script>
  
  <style scoped>
  /* Tambahkan CSS untuk header di sini */
  </style>
  