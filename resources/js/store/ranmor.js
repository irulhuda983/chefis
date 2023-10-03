import { ref } from 'vue';
import { defineStore } from 'pinia'

export const useRanmorStore = defineStore('ranmor', () => {
    const ranmor = ref(localStorage.getItem('RANMOR') ? JSON.parse(localStorage.getItem('RANMOR')) : null)

    const setRanmor = (data) => {
        ranmor.value = data

        !ranmor.value ? localStorage.removeItem('RANMOR') : localStorage.setItem('RANMOR', JSON.stringify(data));
    }

    const deleteRanmor = () => {
        localStorage.removeItem('RANMOR')
        ranmor.value = null
    }

    return {
        ranmor,
        setRanmor,
        deleteRanmor,
    }
})