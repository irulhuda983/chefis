<template>
    <div class="w-full box-border text-[#808080] text-sm 2xl:text-base">
        <div class="w-full box-border">
            <div class="w-full box-border mb-5 flex justify-between box-border items-center">
                <div class="w-2/3">
                    <h1 class="text-zinc-900 font-bold text-xl">Edit Profil</h1>
                </div>
            </div>

            <div class="border border-zinc-100 shadow-sm w-full box-border rounded box-border bg-zinc-50/10 backdrop-blur mb-5 p-4 flex justify-center">
                <div class="w-1/3">
                    <div class="mb-3">
                        {{ errors }}
                    </div>
                    <div class="w-full flex justify-center">
                        <div class="box-border overflow-hidden w-52 h-52 rounded-full bg-gray-200 cursor-pointer relative items-center justufy-center">
                            <img
                                :src="payload.foto ?? ImgUser"
                                alt=""
                                loading="lazy"
                                class="w-full object-cover object-center"
                            />
                            <label for="file-upload" class="w-full flex items-center justify-center bg-black/10 p-3 absolute bottom-0 left-0 right-0 backdrop-blur right-1/3 cursor-pointer">
                                <div class="rounded-full h-8 w-8 bg-black/20 flex items-center justify-center">
                                    <div class="w-5 h-5 text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M17.721,3,16.308,1.168A3.023,3.023,0,0,0,13.932,0H10.068A3.023,3.023,0,0,0,7.692,1.168L6.279,3Z"/><circle cx="12" cy="14" r="4"/><path d="M19,5H5a5.006,5.006,0,0,0-5,5v9a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V10A5.006,5.006,0,0,0,19,5ZM12,20a6,6,0,1,1,6-6A6.006,6.006,0,0,1,12,20Z"/></svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <input
                            id="file-upload"
                            ref="image"
                            type="file"
                            class="sr-only"
                            @change="readImage"
                        />
                    </div>
                    <div class="w-full mr-6">
                        <div class="w-full mb-5">
                            <p class="text-xs 2xl:text-sm w-32 flex-none">Nama</p>
                            <input v-model="payload.nama" type="text" id="nama" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Nama">
                        </div>

                        <div class="w-full mb-5">
                            <p class="text-xs 2xl:text-sm w-32 flex-none">NRP</p>
                            <input v-model="payload.nrp" type="text" id="nrp" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan NRP">
                        </div>

                        <div class="w-full mb-5">
                            <p class="text-xs 2xl:text-sm w-32 flex-none">Password</p>
                            <div class="w-full">
                                <input v-model="payload.password" type="password" id="password" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Password">
                                <div class="text-[10px] italic font-semibold text-orange-700">Kosongkan Jika Tidak ingin merubah password</div>
                            </div>
                        </div>

                        <div class="w-full">
                            <button @click.prevent="updateProfil" class="w-full bg-[#4D79FF] text-white py-2.5 px-6 border border-[#4D79FF] hover:text-[#4D79FF] hover:bg-transparent" :class="loading ? 'cursor-not-allowed':'cursor-pointer'">{{ loading ? "Memuat..." : "Simpan" }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, reactive } from 'vue'
import ImgUser from '@/assets/img/userprofil.png'
import { useNotification } from "@kyvg/vue3-notification"
import { useAuthStore } from '@/store/auth'

export default {
    setup() {
        const user = localStorage.getItem('USER') ? JSON.parse(localStorage.getItem('USER')) : null
        const image = ref()
        const loading = ref(false)
        const { notify } = useNotification()
        const { getUser } = useAuthStore()
        const payload = reactive({
            nama: user.nama,
            nrp: user.nrp,
            password: '',
            foto: user.foto
        })

        const errors = ref(null)

        const updateProfil = async () => {
            loading.value = true
            try{
                let dataPayload = new FormData()
                dataPayload.append("nama", payload.nama ?? '');
                dataPayload.append("nrp", payload.nrp ?? '');
                dataPayload.append("password", payload.password ?? '');
                if (image.value.files[0] !== undefined) {
                    dataPayload.append("foto", image.value.files[0]);
                }

                let { data } = await axios.post('/user/update-profil', dataPayload, {
                    headers: {
                        "Content-Type": "multipart/form-data"
                    }
                })
                getUser()
                notify({
                    text: "Profil Tersimpan",
                    type: 'success',
                    duration: 2000
                })
                payload.password = ''
                // location.reload()

            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }else if(e.response.status == 422) {
                    errors.value = e.response.data.errors
                    notify({
                        text: "Gagal Menyimpan Data, Cek Kembali data yang anda masukkan",
                        type: 'error',
                        duration: 2000
                    })
                }
            }finally{
                loading.value = false
            }
        }

        const readImage = () => {
            payload.foto = URL.createObjectURL(image.value.files[0]);
        }

        return {
            image,
            payload,
            user,
            ImgUser,
            errors,
            readImage,
            updateProfil,
            loading,
        }
    },
}
</script>