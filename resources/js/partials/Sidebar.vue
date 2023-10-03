<template>
    <div class="w-[150px] relative box-border p-[15px]">
        <div class="relative w-full h-full bg-[#4D79FF] text-white rounded-[20px] p-[20px]">
            <div class="flex items-center justify-center w-full flex-col">
                <div class="w-[96px] cursor-pointer mb-10" @click.prevent="router.push({ path: '/' })">
                    <img :src="ImgLantas" alt="" class="w-full">
                </div>

                <div class="space-y-8">
                    <ul class="w-full">
                        <router-link to="/" custom v-slot="{ href, navigate, isExactActive }">
                            <li class="px-3 py-2 rounded-sm mb-5 last:mb-0">
                                <a class="w-full block text-slate-200 truncate transition duration-150" :class="isExactActive ? 'hover:text-slate-200' : 'hover:text-white'" :href="href" @click="navigate">
                                <div class="flex justify-center items-center">
                                    <div class="w-5 h-5" :class="isExactActive ? 'text-white' : 'text-slate-300'">
                                        <HomeIcon />
                                    </div>
                                    <!-- <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Cari</span> -->
                                </div>
                                </a>
                            </li>
                        </router-link>

                        <router-link to="/search" custom v-slot="{ href, navigate, isExactActive }">
                            <li class="px-3 py-2 rounded-sm mb-5 last:mb-0">
                                <a class="block text-slate-200 truncate transition duration-150" :class="isExactActive ? 'hover:text-slate-200' : 'hover:text-white'" :href="href" @click="navigate">
                                <div class="flex items-center">
                                    <div class="w-5 h-5" :class="isExactActive ? 'text-white' : 'text-slate-300'">
                                        <SearchIcon />
                                    </div>
                                    <!-- <span class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">History</span> -->
                                </div>
                                </a>
                            </li>
                        </router-link>
                    </ul>
                </div>
            </div>

            <div class="absolute bottom-0 w-[200px]">
                <img :src="ImgChefis" class="w-[100%]">
            </div>
        </div>
    </div>
</template>

<script>
import { ref, onMounted, onUnmounted, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from "@/store/auth"
import ImgLantas from '@/assets/img/lantas.png'
import ImgChefis from '@/assets/img/chefis.png'
import HomeIcon from '@/components/icon/HomeIcon.vue'
import SearchIcon from '@/components/icon/SearchIcon.vue'


export default {
  name: 'Sidebar',
  components: { HomeIcon, SearchIcon },
  props: ['sidebarOpen'],
  setup(props, { emit }) {

    const store = useAuthStore()
    const trigger = ref(null)
    const sidebar = ref(null)
    const router = useRouter()

    const storedSidebarExpanded = localStorage.getItem('sidebar-expanded')
    const sidebarExpanded = ref(storedSidebarExpanded === null ? false : storedSidebarExpanded === 'true')

    const currentRoute = useRouter().currentRoute.value

    // close on click outside
    const clickHandler = ({ target }) => {
      if (!sidebar.value || !trigger.value) return
      if (
        !props.sidebarOpen ||
        sidebar.value.contains(target) ||
        trigger.value.contains(target)
      ) return
      emit('close-sidebar')
    }

    // close if the esc key is pressed
    const keyHandler = ({ keyCode }) => {
      if (!props.sidebarOpen || keyCode !== 27) return
      emit('close-sidebar')
    }

    onMounted(() => {
      document.addEventListener('click', clickHandler)
      document.addEventListener('keydown', keyHandler)
    })

    onUnmounted(() => {
      document.removeEventListener('click', clickHandler)
      document.removeEventListener('keydown', keyHandler)
    })

    watch(sidebarExpanded, () => {
      localStorage.setItem('sidebar-expanded', sidebarExpanded.value)
      if (sidebarExpanded.value) {
        document.querySelector('body').classList.add('sidebar-expanded')
      } else {
        document.querySelector('body').classList.remove('sidebar-expanded')
      }
    })

    const logout = () => {
      Promise.all([store.logout(), router.push({ path: "/login" })]);
    }

    return {
        router,
        trigger,
        sidebar,
        sidebarExpanded,
        currentRoute,
        logout,
        ImgLantas,
        ImgChefis,
    }
  },
}
</script>