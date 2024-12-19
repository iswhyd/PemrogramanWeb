<script setup>
import { ref, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import api from '../../api';

const router = useRouter();
const route = useRoute();

// State untuk form input
const newMenu = ref({
  nama_menu: '',
  gambar: '', // Menyimpan gambar sebagai file
  link_whatsapp: '',
  link_gofood: '',
});
const imagePreview = ref('');
const errors = ref([]);

// Cek apakah ini mode edit atau tambah
const isEditMode = ref(false);

// Mengambil data menu jika sedang dalam mode edit
onMounted(async () => {
  if (route.params.id) {
    // Mode Edit - fetch data menu berdasarkan ID
    try {
      const response = await api.get(`/api/menus/${route.params.id}`);
      newMenu.value = response.data.data;
      imagePreview.value = response.data.data.gambar; // Tampilkan gambar yang ada
      isEditMode.value = true; // Menandakan mode edit
    } catch (error) {
      console.error('Error fetching menu data:', error);
    }
  } else {
    isEditMode.value = false; // Jika tidak ada ID, berarti mode tambah
  }
});

// Fungsi untuk menangani perubahan gambar
const handleImageChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      imagePreview.value = e.target.result; // Menampilkan pratinjau gambar
    };
    reader.readAsDataURL(file);
    newMenu.value.gambar = file; // Menyimpan file gambar untuk dikirim ke API
  }
};

// Fungsi untuk menyimpan atau memperbarui menu
const submitMenu = async () => {
  try {
    const formData = new FormData();
    formData.append('nama_menu', newMenu.value.nama_menu);
    formData.append('gambar', newMenu.value.gambar);
    formData.append('link_whatsapp', newMenu.value.link_whatsapp);
    formData.append('link_gofood', newMenu.value.link_gofood);

    if (isEditMode.value) {
      // Mode Edit - Update menu
      await api.put(`/api/menus/${route.params.id}`, formData);
    } else {
      // Mode Tambah - Buat menu baru
      await api.post('/api/menus', formData);
    }

    // Reset form setelah submit
    newMenu.value = { nama_menu: '', gambar: '', link_whatsapp: '', link_gofood: '' };
    imagePreview.value = ''; // Reset gambar pratinjau
    router.push('/menus'); // Redirect ke halaman daftar menu
  } catch (error) {
    console.error('Error submitting menu:', error);
    if (error.response && error.response.data) {
      errors.value = error.response.data;
    }
  }
};

// Fungsi untuk membatalkan edit dan reset form
const cancelEdit = () => {
  router.push('/menus'); // Arahkan kembali ke halaman menu
};
</script>

<template>
  <section class="favorite-menu">
    <h3>{{ isEditMode ? 'Perbarui Menu' : 'Tambah Menu' }}</h3>
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
        {{ isEditMode ? 'Perbarui Menu' : 'Tambah Menu' }}
      </button>
      <button v-if="isEditMode" @click="cancelEdit" type="button">
        Batal
      </button>
    </form>
  </section>
</template>
