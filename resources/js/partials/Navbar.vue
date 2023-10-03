<template>
    <div class="w-full box-border py-[15px]">
        <div class="w-full py-[16px] box-border flex items-center justify-between">
            <div>
                <div class="text-[#4D79FF] font-semibold">Hallo</div>
                <div class="text-sm">{{ authStore.user?.nama }}</div>
            </div>

            <UserMenu align="right" />
            <!-- <div class="w-[50px] h-[50px] rounded-full box-border overflow-hidden flex items-center justify-center">
                
            </div> -->
        </div>
    </div>
</template>

<script>
import { useAuthStore } from '@/store/auth'
import UserMenu from '@/components/DropdownProfile.vue'

export default {
    components: { UserMenu },
    setup() {
        const authStore = useAuthStore()

        return {
            authStore
        }
    },
}
</script>