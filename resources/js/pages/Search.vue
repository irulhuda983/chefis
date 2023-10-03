<template>
    <div class="w-full box-border text-[#808080] text-sm 2xl:text-base">
        <!-- form search -->
        <div class="w-full mb-8">        
            <form @submit.prevent="serachNrkb()">
                <div class="w-full box-border relative flex items-center justify-center">
                    <div class="absolute left-4">
                        <div class="w-5 h-5 text-[#4D79FF]">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 513.749 513.749" style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve" class="w-full h-full fill-current">
                            <g>
                                <path d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z"/>
                            </g>
                            </svg>
                        </div>
                    </div>
                    <input v-model="nrkb" type="search" id="search" class="w-full text-[#808080] border border-gray-300 text-gray-900 text-sm rounded-sm block w-full p-3 pl-12 outline-none focus:bg-gray-50 focus:ring-[#4D79FF] focus:border-[#4D79FF] focus:shadow-[0_3px_20px_0_#C2C2C270]" autocomplete="off" placeholder="Silahkan Masukkan Nomor Registrasi Kendaraan Bermotor (NRKB) lalu enter">
                </div>
            </form>
        </div>
        <!-- end form search -->
        <!-- box-shadow: 0px 3px 20px 0px #C2C2C240; -->

        <!-- content -->
        <div v-if="kendaraan != null && error == null">
            <div class="w-full flex items-center space-x-4 mb-5">
                <button @click.prevent="router.push({ name: 'edit' })" class="cursor-pointer bg-[#4D79FF] text-white py-2.5 px-6 border border-[#4D79FF] hover:text-[#4D79FF] hover:bg-transparent">Edit</button>
                <button @click.prevent="cetakDokumen()" class="bg-[#4D79FF] text-white py-2.5 px-4 border border-[#4D79FF] hover:text-[#4D79FF] hover:bg-transparent">Cetak Dokumen</button>
            </div>

            <div class="w-full box-border flex">
                <div class="w-1/3 box-border mr-0 lg:mr-5">
                    <!-- nomor registrasi -->
                    <div class="w-full mb-10">
                        <div class="w-full flex items-center justify-center mb-3">
                            <div class="w-10 relative items-center">
                                <div class="relative w-[20px] h-[20px] rounded-[5px] bg-[#4D79FF50]">
                                    <div class="w-[15px] h-[15px] rounded-[5px] bg-[#4D79FF50] absolute -top-[5px] -right-[5px]"></div>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-[#4D79FF] font-semibold">Nomor Registrasi</h1>
                            </div>
                        </div>

                        <div class="w-full flex">
                            <div class="w-10"></div>
                            <div class="flex-1">
                                <p>{{ kendaraan.nrkb }} - Nomor biasa</p>
                            </div>
                        </div>
                    </div>
                    <!-- end nomor regisrasi -->

                    <!-- data identitas pemilik -->
                    <div class="w-full">
                        <div class="w-full flex items-center justify-center mb-3">
                            <div class="w-10 relative items-center">
                                <div class="relative w-[20px] h-[20px] rounded-[5px] bg-[#4D79FF50]">
                                    <div class="w-[15px] h-[15px] rounded-[5px] bg-[#4D79FF50] absolute -top-[5px] -right-[5px]"></div>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-[#4D79FF] font-semibold">Data Identitas Pemilik</h1>
                            </div>
                        </div>

                        <div class="w-full flex">
                            <div class="w-10"></div>
                            <div class="flex-1">
                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">NIK/TDP</p>
                                    <p>{{ kendaraan.nik ?? '-' }}</p>
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nama</p>
                                    <p>{{ kendaraan?.nama_pemilik ?? '-' }}</p>
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Alamat</p>
                                    <p class="capitalize">
                                        {{ kendaraan?.alamat ?? '-' }}
                                        <br>
                                        Ds. {{ kendaraan?.kelurahan ?? '-' }}, Kab. {{ kendaraan?.kecamatan ?? '-' }}, Kab. {{ kendaraan?.kabkota ?? '-' }}
                                    </p>
                                </div>
                            
                                <div class="w-full">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. Hp</p>
                                    <p>{{ kendaraan?.no_hp ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end data identitas pemilik -->
                </div>

                <div class="w-2/3 box-border">
                    <!-- data identitas pemilik -->
                    <div class="w-full">
                        <div class="w-full flex items-center justify-center mb-3">
                            <div class="w-10 relative items-center">
                                <div class="relative w-[20px] h-[20px] rounded-[5px] bg-[#4D79FF50]">
                                    <div class="w-[15px] h-[15px] rounded-[5px] bg-[#4D79FF50] absolute -top-[5px] -right-[5px]"></div>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-[#4D79FF] font-semibold">Data Kendaraan</h1>
                            </div>
                        </div>

                        <div class="w-full flex">
                            <div class="w-10"></div>
                            <div class="flex-1 w-full flex">
                                <div class="w-1/2 mr-0 lg:mr-5">
                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Merek</p>
                                        <p>{{ kendaraan?.merk ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tipe</p>
                                        <p>{{ kendaraan?.type ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Jenis</p>
                                        <p>{{ kendaraan?.jenis_kendaraan ?? '-' }}</p>
                                    </div>
                                
                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Model</p>
                                        <p>{{ kendaraan?.model_kendaraan ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tahun Pembuatan</p>
                                        <p>{{ kendaraan?.tahun ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Isi Silinder/Daya Listrik</p>
                                        <p>{{ kendaraan?.cc ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nomor Rangka</p>
                                        <p>{{ kendaraan?.no_rangka ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nomor Mesin</p>
                                        <p>{{ kendaraan?.no_mesin ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="w-1/2">
                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Warna Kendaraan</p>
                                        <p>{{ kendaraan?.warna ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Bahan Bakar/Sumber Energi</p>
                                        <p>{{ kendaraan?.bbm ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Warna TNKB</p>
                                        <p>{{ kendaraan?.warna_tnkb ?? '-' }}</p>
                                    </div>
                                
                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tahun Registrasi</p>
                                        <!-- <p>{{ kendaraan?.tgl_faktur ? generateTahun(kendaraan.tgl_faktur) :'-' }}</p> -->
                                        <p>{{ kendaraan?.tahun }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. BPKB</p>
                                        <p>{{ kendaraan?.no_bpkb ?? '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">Kode Lokasi</p>
                                        <!-- <p>{{ kendaraan?.no_hp ?? '-' }}</p> -->
                                        <p>{{ '-' }}</p>
                                    </div>

                                    <div class="w-full mb-5">
                                        <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. Urut Pendaftaran</p>
                                        <p>-</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end data identitas pemilik -->
                </div>
            </div>
        </div>

        <div v-else>
            <p class="capitalize">{{ error }}</p>
        </div>
        <!-- end content -->
    </div>
</template>

<script>
import { ref, nextTick, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useRanmorStore } from '@/store/ranmor'
import CryptoJS from 'crypto-js'

export default {
    setup() {
        const router = useRouter()
        const kendaraan = ref(null)
        const nrkb = ref(null)
        const ranmorStore = useRanmorStore()
        const error = ref(null)

        const serachNrkb = async () => {
            try{
                const { data } = await axios.post('/search-nrkb', { nrkb: nrkb.value})

                let keyData = key.split(':')
                let encrypted = atob(data.data)
                encrypted = JSON.parse(encrypted)

                // iv
                const iv = CryptoJS.enc.Base64.parse(encrypted.iv)
                const value = encrypted.value
                const encKey = CryptoJS.enc.Base64.parse(keyData[1])
                let decrypted = CryptoJS.AES.decrypt(value, encKey, {
                    iv: iv
                })

                decrypted = decrypted.toString(CryptoJS.enc.Utf8)

                const ranmor = JSON.parse(decrypted)

                if(ranmor.nrkb != null) {
                    kendaraan.value = ranmor
                    ranmorStore.setRanmor(ranmor)
                }else{
                    error.value = 'NRKB Tidak ditemukan'
                }

            }catch(e){
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }else if(e.response.status == 422) {
                    error.value = e.response.data.message
                }else{
                    error.value = 'NRKB Tidak ditemukan'
                }
                
            }finally{
                // nrkb.value = null
            }
        }

        const cetakDokumen = async () => {
            // const tgl_faktur = ranmorStore.ranmor.tgl_faktur.split('-')
            let payload = {
                nrkb: ranmorStore.ranmor.nrkb,
                tipe_nrkb: 'nomor_biasa',
                nama_pemilik: ranmorStore.ranmor.nama_pemilik,
                alamat: ranmorStore.ranmor.alamat,
                desa: ranmorStore.ranmor.kelurahan,
                kecamatan: ranmorStore.ranmor.kecamatan,
                kabkota: ranmorStore.ranmor.kabkota,
                nik: ranmorStore.ranmor.nik,
                no_hp: ranmorStore.ranmor.no_hp,
                merk: ranmorStore.ranmor.merk,
                tipe: ranmorStore.ranmor.type,
                jenis_kendaraan: ranmorStore.ranmor.jenis_kendaraan,
                model_kendaraan: ranmorStore.ranmor.model_kendaraan,
                tahun: ranmorStore.ranmor.tahun,
                cc: ranmorStore.ranmor.cc,
                jml_roda: ranmorStore.ranmor.jml_roda,
                jml_sumbu: ranmorStore.ranmor.jml_sumbu,
                no_rangka: ranmorStore.ranmor.no_rangka,
                no_mesin: ranmorStore.ranmor.no_mesin,
                warna: ranmorStore.ranmor.warna,
                bbm: ranmorStore.ranmor.bbm,
                warna_tnkb: ranmorStore.ranmor.warna_tnkb,
                tahun_registrasi: ranmorStore.ranmor.tahun,
                no_bpkb: ranmorStore.ranmor.no_bpkb,
                no_stnk: ranmorStore.ranmor.no_stnk,
                kode_lokasi: null,
                no_urut_pendaftaran: null,
            }

            try{
                const { data } = await axios.post('/surat/store', payload)

                router.push({ name: 'cetak', params: {kode: data.data.kode} })
            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }

                console.log(e)
            }
        }

        const generateTahun = (tgl) => {
            const tgl_faktur = tgl.split('-')

            return tgl_faktur[0]
        }

        onMounted(() => {
            // kendaraan.value = ranmorStore.ranmor
            // console.log(appUrl)
            // console.log(key)
        })

        return { router, kendaraan, nrkb, serachNrkb, error, cetakDokumen, generateTahun }
    },
}
</script>