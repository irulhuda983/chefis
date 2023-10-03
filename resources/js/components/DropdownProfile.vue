<template>
  <div class="relative inline-flex">
    <button
      ref="trigger"
      class="inline-flex justify-center items-center group"
      aria-haspopup="true"
      @click.prevent="dropdownOpen = !dropdownOpen"
      :aria-expanded="dropdownOpen"
    >
      <!-- <div class="flex items-center truncate">
        <span class="truncate ml-2 text-sm font-medium group-hover:text-gray-800">Ahmad Deri.</span>
        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-gray-400" viewBox="0 0 12 12">
          <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
        </svg>
      </div> -->
      <img class="w-12 h-12 rounded-full bg-zinc-300" :src="store.user.foto ?? ImgUser" alt="User" />
    </button>
    <transition
      enter-active-class="transition ease-out duration-200 transform"
      enter-from-class="opacity-0 -translate-y-2"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition ease-out duration-200"
      leave-from-class="opacity-100"
      leave-to-class="opacity-0"
    >
      <div v-show="dropdownOpen" class="origin-top-right z-10 absolute top-full w-24 bg-white border border-gray-200 py-1.5 rounded shadow-lg overflow-hidden mt-1" :class="align === 'right' ? 'right-0' : 'left-0'">
        <ul
          ref="dropdown"
          @focusin="dropdownOpen = true"
          @focusout="dropdownOpen = false"
        >
          <li @click="navigateProfil()">
            <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#">Profil</a>
          </li>
          <li>
            <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#" @click="logout()">Sign Out</a>
          </li>
        </ul>
      </div> 
    </transition>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from "@/store/auth"
import { useRanmorStore } from "@/store/ranmor"
import ImgUser from "@/assets/img/userprofil.png"

export default {
  name: 'DropdownProfile',
  props: ['align'],
  setup() {

    const dropdownOpen = ref(false)
    const trigger = ref(null)
    const dropdown = ref(null)

    const store = useAuthStore()
    const ranmor = useRanmorStore()
    const router = useRouter()

    const user = localStorage.getItem('USER') ? JSON.parse(localStorage.getItem('USER')) : null

    // close on click outside
    const clickHandler = ({ target }) => {
      if (!dropdownOpen.value || dropdown.value.contains(target) || trigger.value.contains(target)) return
      dropdownOpen.value = false
    }

    // close if the esc key is pressed
    const keyHandler = ({ keyCode }) => {
      if (!dropdownOpen.value || keyCode !== 27) return
      dropdownOpen.value = false
    }

    onMounted(() => {
      document.addEventListener('click', clickHandler)
      document.addEventListener('keydown', keyHandler)
    })

    onUnmounted(() => {
      console.log(user)
      document.removeEventListener('click', clickHandler)
      document.removeEventListener('keydown', keyHandler)
    })

    const navigateProfil = () => {
      dropdownOpen.value = false
      router.push({ name: 'profil' })
    }

    const logout = () => {
      ranmor.deleteRanmor()
      store.logout()
    }

    return {
      user,
      router,
      dropdownOpen,
      navigateProfil,
      trigger,
      dropdown,
      logout,
      ImgUser,
      store,
    }
  }
}
</script>