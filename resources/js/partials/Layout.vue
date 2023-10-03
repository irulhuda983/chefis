<template>
  <div class="flex w-full h-screen overflow-hidden box-border">
    <!-- Sidebar -->
    <Sidebar />
    <!-- Content area -->
    <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden px-[15px]">
      <!-- Site header -->
      <Navbar />
      <router-view></router-view>
    </div> 
  </div>
</template>

<script>
import { ref } from 'vue'
import Sidebar from '@/partials/Sidebar.vue'
import Navbar from '@/partials/Navbar.vue'

export default {
  name: 'Home',
  components: {
    Sidebar,
    Navbar,
  }
}
</script>