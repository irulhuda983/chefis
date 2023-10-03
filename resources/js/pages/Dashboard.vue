<template>
    <div class="w-full box-border text-[#808080] text-sm 2xl:text-base">
        <div class="w-full box-border">
            <div class="w-full box-border mb-5 flex justify-between box-border items-center">
                <div class="w-2/3">
                    <h1 class="text-zinc-900 font-bold text-xl">Dashboard</h1>
                </div>
                <div class="w-1/3 flex items-center justify-between space-x-3">
                    <div class="text-sm text-zinc-600">Periode</div>
                    <div class="w-[500px]">
                        <vue-tailwind-datepicker
                            v-model="dateValue"
                            i18n="id"
                            use-range
                            placeholder=" "
                            separator=" s/d "
                            :formatter="formatter"
                        />
                    </div>
                </div>
            </div>

            <div class="w-full flex box-border">
                <div class="w-2/3 box-border mr-4">
                    <div class="border border-zinc-100 shadow-sm w-full box-border rounded box-border bg-zinc-50/10 backdrop-blur mb-5">
                        <div class="text-black box-border p-4 font-semibold">Statistik Surat</div>
                        <apexchart
                            height="360"
                            type="area"
                            :options="chartOptions"
                            :series="series"
                        ></apexchart>
                    </div>

                    <div class="border border-zinc-100 shadow-sm w-full box-border rounded box-border bg-zinc-50/10 backdrop-blur mb-5">
                        <div class="p-4 w-full box-border">
                            <h1 class="text-black box-border font-semibold">Aktifitas Terbaru</h1>
                        </div>

                        <table class="w-full text-xs text-zinc-800">
                            <thead>
                                <tr class="border-y bg-zinc-50">
                                    <th class="text-start px-3 py-2">Personil</th>
                                    <th class="text-start px-3 py-2">Aktifitas</th>
                                    <th class="text-start px-3 py-2">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody v-if="loadingTableHistory">
                                <tr v-for="i in 5" :key="i" class="border-b">
                                    <td class="text-start px-3 py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-10 h-10 rounded-full bg-zinc-200 box-border overflow-hidden flex items-center justify-center">
                                                <div class="w-5 h-5 w-full bg-zinc-200 text-zinc-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="user" data-name="Layer 1" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z"/><circle cx="12" cy="6" r="6"/></svg>
                                                </div>
                                            </div>

                                            <div>
                                                <p class="mb-1 font-semibold bg-zinc-200 text-zinc-200">Nama Personil</p>
                                                <p class="bg-zinc-200 text-zinc-200">123456</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-start px-3 py-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="bg-zinc-200 w-6 h-6 rounded flex items-center justify-center text-zinc-200">
                                                S
                                            </div>
                                            <div class="bg-zinc-200 text-zinc-200">Mencari data ranmor dengan nrkb S 3044 ABC</div>
                                        </div>
                                    </td>
                                    <td class="text-start px-3 py-2">
                                        <span class="bg-zinc-200 text-zinc-200">1 days ago</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <template v-if="history.length > 0">
                                    <tr class="border-b" v-for="(item, index) in history" :key="index">
                                        <td class="text-start px-3 py-2">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-10 h-10 rounded-full bg-zinc-300 box-border overflow-hidden flex items-end justify-center">
                                                    <img :src="PoliceImg" alt="" class="h-8">
                                                    <!-- <div class="w-5 h-5 w-full">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="user" data-name="Layer 1" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z"/><circle cx="12" cy="6" r="6"/></svg>
                                                    </div> -->
                                                </div>

                                                <div>
                                                    <p class="mb-1 font-semibold">{{ item.nama }}</p>
                                                    <p class="text-zinc-400">{{ item.nrp ?? '-'}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-start px-3 py-2">
                                            <div class="flex items-center space-x-2">
                                                <div v-if="item.tipe == 'search' || item.tipe == 'seacrh'" class="bg-blue-200 w-6 h-6 rounded flex items-center justify-center text-blue-600">
                                                    <div class="w-3 h-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M23.707,22.293l-5.969-5.969a10.016,10.016,0,1,0-1.414,1.414l5.969,5.969a1,1,0,0,0,1.414-1.414ZM10,18a8,8,0,1,1,8-8A8.009,8.009,0,0,1,10,18Z"/></svg>
                                                    </div>
                                                </div>

                                                <div v-if="item.tipe == 'sprkb'" class="bg-orange-200 w-6 h-6 rounded flex items-center justify-center text-orange-600">
                                                    <div class="w-3 h-3">
                                                        <svg id="sprkb" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" class="w-full h-full fill-current">
                                                <path d="m11 12a1 1 0 0 1 0 2h-3a1 1 0 0 1 0-2zm6-3a1 1 0 0 0 -1-1h-8a1 1 0 0 0 0 2h8a1 1 0 0 0 1-1zm-9-3h8a1 1 0 0 0 0-2h-8a1 1 0 0 0 0 2zm12 13.444v3.833a.721.721 0 0 1 -1.231.51l-.769-.768-.769.768a.721.721 0 0 1 -1.231-.51v-3.833a3.987 3.987 0 0 1 2-7.444 3.939 3.939 0 0 1 1 .142v-7.142a3 3 0 0 0 -3-3h-8a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3h5a1 1 0 0 1 0 2h-5a5.006 5.006 0 0 1 -5-5v-12a5.006 5.006 0 0 1 5-5h8a5.006 5.006 0 0 1 5 5v8.382a3.95 3.95 0 0 1 -1 6.062zm0-3.444a2 2 0 1 0 -2 2 2 2 0 0 0 2-2z"/></svg>
                                                    </div>
                                                </div>

                                                <div v-if="item.tipe == 'formulir'" class="bg-green-200 w-6 h-6 rounded flex items-center justify-center text-green-600">
                                                    <div class="w-3 h-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="formulir" data-name="Layer 1" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M17,24H7c-2.757,0-5-2.243-5-5V5C2,2.243,4.243,0,7,0h10c2.757,0,5,2.243,5,5v14c0,2.757-2.243,5-5,5ZM7,2c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h10c1.654,0,3-1.346,3-3V5c0-1.654-1.346-3-3-3H7Zm11,4c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1Zm0,6c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1Zm0,6c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1ZM10,7v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Zm0,6v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Zm0,6v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Z"/></svg>
                                                    </div>
                                                </div>


                                                <div>{{ item.keterangan }}</div>
                                            </div>
                                        </td>
                                        <td class="text-start px-3 py-2">{{ item.waktu }}</td>
                                    </tr>

                                    <tr v-if="metaHistory != null">
                                        <td class="p-3 w-full" colspan="3">
                                            <nav class="flex w-full justify-end" aria-label="Page navigation example">
                                                <ul class="inline-flex -space-x-px text-xs">
                                                    <li v-for="(item, i) in metaHistory.links" :key="i">
                                                        <a href="#" @click.prevent="paginateHistory(item, metaHistory.last_page)" class="flex items-center justify-center px-2 h-6 ml-0 leading-tight border" v-html="item.label" :class="item.active ? 'bg-blue-500 text-white border-blue-500':'text-gray-600 hover:bg-gray-100 hover:text-gray-700 border-gray-400'"></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </td>
                                    </tr>
                                </template>

                                <template v-else>
                                    <tr>
                                        <td colspan="3" class="text-left py-4 text-black px-3 text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="w-1/3 box-border">
                    <div class="w-full flex items-center justify-between mb-4 space-x-5">
                        <div class="box-border p-2 rounded-[25px] w-1/2 h-40 bg-gradient-to-tr from-rose-500 via-pink-400 to-pink-200">
                            <div class="flex mb-4">
                                <div class="w-16 h-16 bg-gradient-to-tr from-rose-600 via-pink-500 to-pink-300 rounded-[20px] flex items-center justify-center mr-4 text-white flex-none">
                                    <div class="w-8 h-8">
                                        <svg id="sprkb" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" class="w-full h-full fill-current">
                                            <path d="m11 12a1 1 0 0 1 0 2h-3a1 1 0 0 1 0-2zm6-3a1 1 0 0 0 -1-1h-8a1 1 0 0 0 0 2h8a1 1 0 0 0 1-1zm-9-3h8a1 1 0 0 0 0-2h-8a1 1 0 0 0 0 2zm12 13.444v3.833a.721.721 0 0 1 -1.231.51l-.769-.768-.769.768a.721.721 0 0 1 -1.231-.51v-3.833a3.987 3.987 0 0 1 2-7.444 3.939 3.939 0 0 1 1 .142v-7.142a3 3 0 0 0 -3-3h-8a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3h5a1 1 0 0 1 0 2h-5a5.006 5.006 0 0 1 -5-5v-12a5.006 5.006 0 0 1 5-5h8a5.006 5.006 0 0 1 5 5v8.382a3.95 3.95 0 0 1 -1 6.062zm0-3.444a2 2 0 1 0 -2 2 2 2 0 0 0 2-2z"/>
                                        </svg>
                                    </div>
                                </div>

                                <div class="font-semibold text-lg mt-2 text-white">SPRKB</div>
                            </div>

                            <div class="px-3 py-5 box-border text-white w-full flex justify-between items-start">
                                <div class="text-[12px] mb-[px]">Total<br>Dicetak</div>
                                <div>
                                    <div class="text-3xl font-semibold">{{ totalSprkb }}</div>
                                    <div class="text-[10px] opacity-0">-</div>
                                </div>
                            </div>
                        </div>

                        <div class="box-border p-2 rounded-[25px] w-1/2 h-40 bg-gradient-to-tr from-indigo-500 via-blue-400 to-sky-300">
                            <div class="flex mb-2">
                                <div class="w-16 h-16 bg-gradient-to-tr from-indigo-600 via-blue-500 to-sky-300 rounded-[20px] flex items-center justify-center mr-4 text-white flex-none">
                                    <div class="w-8 h-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="formulir" data-name="Layer 1" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M17,24H7c-2.757,0-5-2.243-5-5V5C2,2.243,4.243,0,7,0h10c2.757,0,5,2.243,5,5v14c0,2.757-2.243,5-5,5ZM7,2c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h10c1.654,0,3-1.346,3-3V5c0-1.654-1.346-3-3-3H7Zm11,4c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1Zm0,6c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1Zm0,6c0-.552-.448-1-1-1h-4c-.552,0-1,.448-1,1s.448,1,1,1h4c.552,0,1-.448,1-1ZM10,7v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Zm0,6v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Zm0,6v-2c0-.552-.448-1-1-1h-2c-.552,0-1,.448-1,1v2c0,.552,.448,1,1,1h2c.552,0,1-.448,1-1Z"/></svg>
                                    </div>
                                </div>

                                <div class="font-semibold text-lg mt-2 text-white">Formulir</div>
                            </div>

                            <div class="px-3 py-5 box-border text-white w-full flex justify-between items-start">
                                <div class="text-[12px] mb-[px]">Total<br>Dicetak</div>
                                <div>
                                    <div class="text-3xl font-semibold">{{ totalFormulir }}</div>
                                    <div class="text-[10px] opacity-0">-</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="w-full box-border border border-zinc-200 rounded bg-zinc-50/10 backdrop-blur">
                        <div class="flex items-center justify-between p-3">
                            <h1 class="text-xs font-bold text-zinc-900">Total Cetak Berdasarkan Personil</h1>
                            <div class="text-xs">
                                <button
                                    class="rounded text-[10px] px-2 py-1 mr-2"
                                    :class="tipeSurat == 'sprkb' ? 'bg-[#4D79FF] text-white': 'bg-zinc-200 text-black' "
                                    @click.prevent="changeTipe('sprkb')
                                ">SPRKB</button>
                                <button
                                    class="rounded text-[10px] px-2 py-1"
                                    :class="tipeSurat == 'formulir' ? 'bg-[#4D79FF] text-white': 'bg-zinc-200 text-black' "
                                    @click.prevent="changeTipe('formulir')"
                                >Formulir</button>
                            </div>
                        </div>
                        <table class="w-full text-xs">
                            <thead>
                                <tr class="bg-zinc-100 border-y">
                                    <th class="text-left px-4 py-2 text-zinc-700 text-[11px] font-bold">Petugas</th>
                                    <th class="text-right px-4 py-2 text-zinc-700 text-[11px] font-bold">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody v-if="loadingTablePersonil">
                                <tr>
                                    <td class="text-left py-4 text-black px-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-10 h-10 rounded-full bg-zinc-200 box-border overflow-hidden flex items-center justify-center">
                                                <div class="w-10 h-10 w-full bg-zinc-200">
                                                </div>
                                            </div>

                                            <div>
                                                <p class="mb-1">
                                                    <span class="bg-zinc-200 text-zinc-200">Lorem, ipsum.</span>
                                                </p>
                                                <p class="text-zinc-400">
                                                    <span class="bg-zinc-200 text-zinc-200">Lorem, ipsum.</span>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right py-4 px-3 font-bold text-sm text-zinc-800">
                                        <span class="bg-zinc-200 text-zinc-200">2</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <template v-if="totalByPersonil.length > 0">
                                    <tr v-for="(item, index) in totalByPersonil" :key="index" class="hover:bg-zinc-200">
                                        <td class="text-left py-4 text-black px-3">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-500 via-blue-400 to-sky-300 box-border overflow-hidden flex items-end justify-center">
                                                    <div class="w-8 h-8 w-full text-zinc-50">
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="user" data-name="Layer 1" viewBox="0 0 24 24" class="w-full h-full fill-current"><path d="M16.043,14H7.957A4.963,4.963,0,0,0,3,18.957V24H21V18.957A4.963,4.963,0,0,0,16.043,14Z"/><circle cx="12" cy="6" r="6"/></svg>
                                                    </div>
                                                </div>

                                                <div>
                                                    <p class="mb-1 font-semibold">{{ item.nama }}</p>
                                                    <p class="text-zinc-400">{{ item.nrp ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right py-4 px-3 font-bold text-sm text-zinc-800">{{ item.total }}</td>
                                    </tr>
                                </template>

                                <template v-else>
                                    <tr>
                                        <td colspan="2" class="text-left py-4 text-black px-3 text-center">
                                            Tidak Ada Data
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, nextTick, computed, onMounted, watch } from 'vue'
import VueApexCharts from "vue3-apexcharts"
import { format } from 'date-fns'
import id from 'date-fns/locale/id'
import PoliceImg from '@/assets/img/policeman.png'

export default {
    components: {
        apexchart: VueApexCharts,
    },
    setup() {
        const series = ref([])
        const tipeSurat = ref('sprkb')
        const history = ref([])
        const metaHistory = ref(null)
        const pageHistory = ref(1)
        const totalFormulir = ref(null)
        const totalSprkb = ref(null)
        const totalByPersonil = ref([])
        const dateValue = ref([])
        const formatter = ref({
            date: 'YYYY-MM-DD',
            month: 'MMMM'
        })

        const loading = ref(true)
        const loadingTablePersonil = ref(true)
        const loadingTableHistory = ref(true)

        const changeTipe = (tipe) => {
            tipeSurat.value = tipe
            getTotalByPersonil()
        }

        const getTotalSurat = async () => {
            loading.value = true
            try{
                const date = dateValue.value
                const range = date.length > 0 ? [
                            format(new Date(date[0]), 'dd-MM-yyyy', { locale: id }),
                            format(new Date(date[1]), 'dd-MM-yyyy', { locale: id })
                        ] : null

                const { data } = await axios.get('statistik/total-surat', {
                    params: {
                        range: range
                    }
                })

                totalFormulir.value = data.data.formulir
                totalSprkb.value = data.data.sprkb
            }catch(e) {
                // console.log(e)
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }
            }finally {
                loading.value = false
            }
        }

        const getTotalByPersonil = async () => {
            loadingTablePersonil.value = true
            try{
                const date = dateValue.value
                const range = date.length > 0 ? [
                            format(new Date(date[0]), 'dd-MM-yyyy', { locale: id }),
                            format(new Date(date[1]), 'dd-MM-yyyy', { locale: id })
                        ] : null

                const { data } = await axios.get('statistik/total-by-personil', {
                    params: {
                        range: range,
                        tipe: tipeSurat.value
                    }
                })

                totalByPersonil.value = data.data
            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }
            }finally {
                loadingTablePersonil.value = false
            }
        }

        const getStatistik = async () => {
            loading.value = true
            try{
                const date = dateValue.value
                const range = date.length > 0 ? [
                            format(new Date(date[0]), 'dd-MM-yyyy', { locale: id }),
                            format(new Date(date[1]), 'dd-MM-yyyy', { locale: id })
                        ] : null

                const { data } = await axios.get('statistik/total-by-tanggal', { params: { range: range } })

                series.value = data.data
            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }
            }finally {
                loading.value = false
            }
        }

        const getHistory = async () => {
            loadingTableHistory.value = true
            try{
                const date = dateValue.value
                const range = date.length > 0 ? [
                            format(new Date(date[0]), 'dd-MM-yyyy', { locale: id }),
                            format(new Date(date[1]), 'dd-MM-yyyy', { locale: id })
                        ] : null

                const { data } = await axios.get('history', {
                    params: {
                        range: range,
                        page: pageHistory.value
                    }
                })

                history.value = data.data
                metaHistory.value = data.meta
            }catch(e) {
                if(e.response.status == 401) {
                    localStorage.removeItem('TOKEN')
                    location.reload()
                }
            }finally{
                loadingTableHistory.value = false
            }
        }

        const paginateHistory = (item, last) => {
            if(item.label == '&laquo; Previous') {
                if(item.url == null) {
                    pageHistory.value = 1
                }else{
                    pageHistory.value = parseInt(pageHistory.value) - 1
                }
            }else if(item.label == 'Next &raquo;') {
                if(item.url == null) {
                    pageHistory.value = last
                }else{
                    pageHistory.value = parseInt(pageHistory.value) + 1
                }
            }else {
                pageHistory.value = parseInt(item.label)
            }

            getHistory()
        }

        const chartOptions = computed(() => ({
            chart: {
                id: "statistik-surat",
                type: 'area',
                zoom: { enabled: false },
                toolbar: { show: false },
                stacked: true,
                fontFamily: "Poppins, sans-serif",
                animations: {
                    enabled: true,
                    easing: 'easeinout',
                    speed: 800,
                    animateGradually: {
                        enabled: true,
                        delay: 150
                    },
                    dynamicAnimation: {
                        enabled: true,
                        speed: 350
                    }
                }
            },
            grid: {
                show: true,
                borderColor: '#E4E4E7',
            },
            plotOptions: {
                area: {
                    fillTo: 'origin',
                }
            },
            dataLabels: { enabled: false },
            markers: {
                size: 0,
            },
            stroke: { curve: 'smooth', width: 2 },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.5,
                    opacityTo: 0,
                    stops: [0, 90, 100]
                },
            },
            colors: ['#ED7FB5', '#4D79FF'],
            tooltip: {
                enabled: true,
                fillSeriesColor: false,
                theme: 'dark',
                x: { show: false }
            },
            xaxis: {
                type: 'datetime',
                show: true,
            },
            yaxis: {
                show: true,
                labels: {
                    show: true,
                    style: {
                        colors: ['#71717a'],
                        fontSize: '12px',
                        fontFamily: 'Roboto, sans-serif',
                    }
                }
            },
            legend: {
                horizontalAlign: "left",
                position: 'top',
            }
        }))


        onMounted(() => {
            getTotalSurat()
            getStatistik()
            getTotalByPersonil()
            getHistory()
        })

        watch(dateValue, async (newDateValue, oldDateValue) => {
            getTotalSurat()
            getStatistik()
            getTotalByPersonil()
            getHistory()
        })

        return {
            PoliceImg,
            metaHistory,
            loading,
            loadingTablePersonil,
            loadingTableHistory,
            dateValue,
            tipeSurat,
            formatter,
            history,
            totalFormulir,
            totalSprkb,
            totalByPersonil,
            chartOptions,
            changeTipe,
            series,
            paginateHistory,
            pageHistory
        }
    },
}
</script>