<script setup>
import { ref } from 'vue';
import api from '../api'; // Pastikan Anda memiliki konfigurasi axios untuk API
import dayjs from 'dayjs';

// Format tanggal (jika perlu, untuk penyesuaian tanggal)
const formatDate = (date) => dayjs(date).format('DD MMM YYYY, HH:mm');

// State utama
const menus = ref([]);
const newMenu = ref({
  nama_menu: '',
  gambar: '', // Menyimpan URL gambar
  link_whatsapp: '',
  link_gofood: '',
});
const editMenuState = ref(null);
const errors = ref([]);
const imagePreview = ref(''); // State untuk menampilkan gambar pratinjau

// Fetch data menu
const fetchMenus = async () => {
  try {
    const response = await api.get('/api/menus');
    menus.value = response.data.data;
  } catch (error) {
    console.error('Error fetching menus:', error);
  }
};

// Fungsi untuk menangani pemilihan gambar
const handleImageChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target.result; // Menampilkan gambar pratinjau
    };
    reader.readAsDataURL(file);
    newMenu.value.gambar = file; // Menyimpan file gambar untuk dikirim ke API
  }
};

// Submit menu (create/update)
const submitMenu = async () => {
  try {
    const formData = new FormData();
    formData.append('nama_menu', newMenu.value.nama_menu);
    formData.append('gambar', newMenu.value.gambar); // Menyertakan gambar sebagai file
    formData.append('link_whatsapp', newMenu.value.link_whatsapp);
    formData.append('link_gofood', newMenu.value.link_gofood);

    if (editMenuState.value) {
      // Update menu
      await api.put(`/api/menus/${editMenuState.value.id}`, formData);
      editMenuState.value = null;  // Reset setelah update
    } else {
      // Create menu baru
      await api.post('/api/menus', formData);
    }

    // Reset form setelah submit
    newMenu.value = { nama_menu: '', gambar: '', link_whatsapp: '', link_gofood: '' };
    imagePreview.value = ''; // Reset gambar pratinjau
    fetchMenus();
  } catch (error) {
    console.error('Error submitting menu:', error);
    if (error.response && error.response.data) {
      errors.value = error.response.data;
    }
  }
};

// Edit menu (memuat data ke form)
const editExistingMenu = (menu) => {
  editMenuState.value = menu;
  newMenu.value = { ...menu }; // Mengisi form dengan data menu yang akan diedit
  imagePreview.value = menu.gambar; // Menampilkan gambar yang ada
};

// Delete menu
const deleteMenu = async (id) => {
  try {
    await api.delete(`/api/menus/${id}`);
    fetchMenus();
  } catch (error) {
    console.error('Error deleting menu:', error);
  }
};

// Fungsi untuk membatalkan proses edit
const cancelEdit = () => {
  editMenuState.value = null;  // Reset state edit
  newMenu.value = { nama_menu: '', gambar: '', link_whatsapp: '', link_gofood: '' };  // Kosongkan form
  imagePreview.value = '';  // Hapus gambar pratinjau
};

// Fetch data saat komponen dimuat
fetchMenus();
</script>

<template>
  <section class="favorite-menu">
    <h3>MENU FAVORITE</h3>
    <div class="menu-container">
      <div v-for="menu in menus" :key="menu.id" class="menu-card">
        <img :src="menu.gambar" :alt="menu.nama_menu" />
        <h4>{{ menu.nama_menu }}</h4>
        <div class="menu-links">
          <button :href="menu.link_whatsapp" target="_blank">Order Via Whatsapp</button>
          <button :href="menu.link_gofood" target="_blank">Order Via GoFood</button>
        </div>
        <div class="menu-actions">
          <button @click="editExistingMenu(menu)" class="edit-button">Edit</button>
          <button @click="deleteMenu(menu.id)" class="delete-button">Hapus</button>
        </div>
      </div>
      <p v-if="menus.length === 0">Tidak ada menu favorite saat ini.</p>
    </div>
    <form @submit.prevent="submitMenu" class="menu-form">
      <input
        type="text"
        v-model="newMenu.nama_menu"
        placeholder="Nama Menu"
        required
      />
      <input
        type="file"
        @change="handleImageChange"
        accept="image/*"
        required
      />
      <div v-if="imagePreview" class="image-preview">
        <img :src="imagePreview" alt="Gambar pratinjau" />
      </div>
      <input
        type="text"
        v-model="newMenu.link_whatsapp"
        placeholder="Link Whatsapp"
        required
      />
      <input
        type="text"
        v-model="newMenu.link_gofood"
        placeholder="Link GoFood"
        required
      />
      <button type="submit">
        {{ editMenuState ? 'Perbarui Menu' : 'Tambah Menu' }}
      </button>
      <button
        v-if="editMenuState"
        type="button"
        @click="cancelEdit"
      >
        Batal
      </button>
    </form>
  </section>
</template>

<style scoped>
/* Style tetap sama */
</style>
