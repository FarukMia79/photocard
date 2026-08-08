<template>
  <div>
    <Navbar />
    <div class="flex overflow-hidden bg-white pt-16">
      <Sidebar />
      <div class="relative w-full h-full overflow-y-auto lg:ml-64 bg-gray-50 min-h-screen">
        <main class="p-6">
          <router-view />
        </main>
      </div>
    </div>
  </div>
</template>

<script setup>
import Navbar from '../components/layouts/Navbar.vue';
import Sidebar from '../components/layouts/Sidebar.vue';
</script>