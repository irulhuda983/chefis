<template>
    <div class="w-full box-border text-[#808080] text-sm 2xl:text-base">
        <div class="w-full box-border flex mb-5">
            <div class="w-1/3 box-border mr-0 lg:mr-12">
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
                            <input type="text" v-model="payload.nrkb" id="nrkb" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan NRKB">
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
                                <input v-model="payload.nik" type="text" id="nik" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan NIK">
                            </div>

                            <div class="w-full mb-5">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nama</p>
                                <input v-model="payload.nama_pemilik" type="text" id="nama" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Nama">
                            </div>

                            <div class="w-full mb-5">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">Alamat</p>
                                <input v-model="payload.alamat" type="text" id="search" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Alamat">
                            </div>

                            <div class="w-full">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">Desa</p>
                                <input v-model="payload.desa" type="text" id="desa" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Desa">
                            </div>

                            <div class="w-full">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">Kecamatan</p>
                                <input v-model="payload.kecamatan" type="text" id="kecamatan" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Kecamatan">
                            </div>

                            <div class="w-full">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">Kabupaten</p>
                                <input v-model="payload.kabkota" type="text" id="kabkota" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Kab kota">
                            </div>
                        
                            <div class="w-full">
                                <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. Hp</p>
                                <input v-model="payload.no_hp" type="text" id="nohp" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan No. HP">
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
                                    <input v-model="payload.merk" type="text" id="merek" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Merek">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tipe</p>
                                    <input v-model="payload.tipe" type="text" id="tipe" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Tipe">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Jenis</p>
                                    <input v-model="payload.jenis_kendaraan" type="text" id="jenis" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Jenis">
                                </div>
                            
                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Model</p>
                                    <input v-model="payload.model_kendaraan" type="text" id="model" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Model">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tahun Pembuatan</p>
                                    <input v-model="payload.tahun" type="text" id="tahun" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Tahun Pembuatan">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Isi Silinder/Daya Listrik</p>
                                    <input v-model="payload.cc" type="text" id="isiSilinder" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Isi Silinder">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nomor Rangka</p>
                                    <input v-model="payload.no_rangka" type="text" id="noka" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Nomor Rangka">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Nomor Mesin</p>
                                    <input v-model="payload.no_mesin" type="text" id="nosin" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Nomor Mesin">
                                </div>
                            </div>

                            <div class="w-1/2">
                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Warna Kendaraan</p>
                                    <input v-model="payload.warna" type="text" id="warna" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Warna Kendaraan">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Bahan Bakar/Sumber Energi</p>
                                    <input v-model="payload.bbm" type="text" id="bahanbakar" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Bahan Bakar">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Warna TNKB</p>
                                    <input v-model="payload.warna_tnkb" type="text" id="warnaNrkb" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Warna NRKB">
                                </div>
                            
                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Tahun Registrasi</p>
                                    <input v-model="payload.tahun_registrasi" type="text" id="tahun" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Tahun Registrasi">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. BPKB</p>
                                    <input v-model="payload.no_bpkb" type="text" id="nobpkb" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan No. BPKB">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">Kode Lokasi</p>
                                    <input v-model="payload.kode_lokasi" type="text" id="kodelokasi" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Kode Lokasi">
                                </div>

                                <div class="w-full mb-5">
                                    <p class="text-[#4D79FF] text-xs 2xl:text-sm">No. Urut Pendaftaran</p>
                                    <input v-model="payload.no_urut_pendaftaran" type="text" id="nourut" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-xs 2xl:text-sm rounded-sm block w-full p-2.5 outline-none focus:ring-[#4D79FF] focus:border-[#4D79FF]" autocomplete="off" placeholder="Masukkan Nomor Urut">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end data identitas pemilik -->
            </div>
        </div>

        <div class="w-full flex items-center space-x-4 justify-end mb-8">
            <button @click.prevent="router.push({ path: '/search' })" class="bg-[#4D79FF] text-white py-2.5 px-6 border border-[#4D79FF] hover:text-[#4D79FF] hover:bg-transparent">Batal</button>

            <button
                            @click.prevent="cetakDokumen()"
                            type="submit"
                            class="bg-[#4D79FF] text-white py-2.5 px-4 border border-[#4D79FF] hover:text-[#4D79FF] hover:bg-transparent"
                            :class="[
                                loading ? ' cursor-not-allowed' : '',
                                loading ? 'bg-blue-800' : 'bg-[#4D79FF]',
                            ]"
                            >
                                {{ loading ? 'Memuat...' : 'Simpan & Cetak Dokumen' }}
                            </button>
        </div>
    </div>
</template>

<script>
import { reactive, onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useRanmorStore } from '@/store/ranmor'

export default {
    setup() {
        const payload = reactive({
                nrkb: null,
                tipe_nrkb: null,
                nama_pemilik: null,
                alamat: null,
                desa: null,
                kecamatan: null,
                kabkota: null,
                nik: null,
                no_hp: null,
                merk: null,
                tipe: null,
                jenis_kendaraan: null,
                model_kendaraan: null,
                tahun: null,
                cc: null,
                jml_roda: null,
                jml_sumbu: null,
                no_rangka: null,
                no_mesin: null,
                warna: null,
                bbm: null,
                warna_tnkb: null,
                tahun_registrasi: null,
                no_bpkb: null,
                no_stnk: null,
                kode_lokasi: null,
                no_urut_pendaftaran: null,
            })

        const ranmorStore = useRanmorStore()
        const ranmor = ranmorStore.ranmor
        const errors = reactive({nrkb:null})

        const loading = ref(false)

        const router = useRouter()

        const cetakDokumen = async () => {

            try{
                const { data } = await axios.post('/surat/store', payload)

                router.push({ name: 'cetak', params: {kode: data.data.kode} })
            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }else if(e.response.status == 422){

                }

                console.log(e)
            }finally {
                loading.value = false
            }
        }

        onMounted(() => {
            payload.nrkb = ranmor.nrkb
            payload.tipe_nrkb = 'nomor_biasa'
            payload.nama_pemilik = ranmor.nama_pemilik
            payload.alamat = ranmor.alamat
            payload.desa = ranmor.kelurahan
            payload.kecamatan = ranmor.kecamatan
            payload.kabkota = ranmor.kabkota
            payload.nik = ranmor.nik
            payload.no_hp = ranmor.no_hp
            payload.merk = ranmor.merk
            payload.tipe = ranmor.type
            payload.jenis_kendaraan = ranmor.jenis_kendaraan
            payload.model_kendaraan = ranmor.model_kendaraan
            payload.tahun = ranmor.tahun
            payload.cc = ranmor.cc
            payload.jml_roda = ranmor.jml_roda
            payload.jml_sumbu = ranmor.jml_sumbu
            payload.no_rangka = ranmor.no_rangka
            payload.no_mesin = ranmor.no_mesin
            payload.warna = ranmor.warna
            payload.bbm = ranmor.bbm
            payload.warna_tnkb = ranmor.warna_tnkb
            payload.tahun_registrasi = ranmor.tahun
            payload.no_bpkb = ranmor.no_bpkb
            payload.no_stnk = ranmor.no_stnk
            payload.kode_lokasi = null
            payload.no_urut_pendaftaran = null
        })

        return {
            errors,
            payload,
            loading,
            cetakDokumen,
            router,
        }
    },
}
</script>