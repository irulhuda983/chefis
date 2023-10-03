<template>
    <div
        class="w-full box-border text-[#808080] text-sm 2xl:text-base h-full overflow-y-hidden pb-5"
    >
        <div class="w-full mb-5 mt-8">
            <h1 class="text-center text-xl font-semibold text-[#4D79FF]">
                Cetak Dokumen
            </h1>
        </div>
        <div class="w-full flex items-center justify-center">
            <button
                class="bg-[#4D79FF] rounded block w-52 h-52 text-white font-semibold mr-4"
                @click.prevent="cetakFormulir()"
            >
                FORMULIR
            </button>
            <button
                class="bg-[#4D79FF] rounded block w-52 h-52 text-white font-semibold mr-4"
                @click.prevent="cetakSprkb()"
            >
                SPRKB
            </button>
        </div>

        <modal ref="modalPdf">
            <template v-slot:modal-body>
                <div
                    class="w-full h-full bg-[#F5F5F5] flex items-center justify-center"
                >
                    <div
                        class="w-2/3 h-full box-border overflow-hidden p-4 px-20"
                    >
                        <div
                            class="w-full h-full box-border overflow-x-hidden overflow-y-auto"
                        >
                            <vue-pdf-embed
                                id="pdfRef"
                                ref="pdfRef"
                                :source="pdfSource + '?bg=show'"
                                :page="page"
                                @rendered="handleDocumentRender"
                            />

                            <iframe
                                id="print-iframe"
                                name="print-iframe"
                                :src="pdfSource"
                                allowtransparency="true"
                                frameborder="0"
                                scrolling="no"
                                allowfullscreen
                                mozallowfullscreen
                                webkitallowfullscreen
                                oallowfullscreen
                                msallowfullscreen
                                style="display: none"
                            ></iframe>
                        </div>
                    </div>
                    <div
                        class="w-1/3 h-full bg-[#E7EDFF] box-border p-4 relative"
                    >
                        <h1 class="text-[#4D79FF] text-left font-semibold">
                            Cetak Formulir Cek Fisik
                        </h1>

                        <div
                            class="absolute box-border px-3 left-0 bottom-3 w-full flex items-center justify-end"
                        >
                            <div>
                                <button
                                    @click.prevent="printPdf()"
                                    class="bg-[#4D79FF] border border-[#4D79FF] px-6 py-2 text-white mr-3 text-xs"
                                >
                                    {{ isLoading ? "Memuat..." : "Cetak" }}
                                </button>
                                <button
                                    @click.prevent="closeModal()"
                                    class="bg-white border border-[#4D79FF] px-6 py-2 mr-3 text-xs text-[#4D79FF]"
                                >
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </modal>
    </div>
</template>

<script>
import { ref, nextTick } from "vue";
import Modal from "@/components/Modal.vue";
import VuePdfEmbed from "vue-pdf-embed";
import { useRouter, useRoute } from "vue-router";
import { useNotification } from "@kyvg/vue3-notification";

export default {
    components: { VuePdfEmbed, Modal },
    setup() {
        const router = useRouter();
        const route = useRoute();
        const modalPdf = ref();
        const fileTipe = ref(null);

        const isLoading = ref(false);
        const page = ref(1);
        const pageCount = ref(1);
        const { notify } = useNotification();
        const pdfSource = ref(null);
        const showAllPages = ref(false);

        const cetakFormulir = async () => {
            modalPdf.value.open = true;
            pdfSource.value = `${appUrl}/cetak-formulir/${route.params.kode}`;
            fileTipe.value = "formulir";
        };

        const cetakSprkb = () => {
            modalPdf.value.open = true;
            pdfSource.value = `${appUrl}/cetak-sprkb/${route.params.kode}`;
            fileTipe.value = "sprkb";
        };

        const closeModal = () => {
            modalPdf.value.open = false;
            pdfSource.value = null;
            fileTipe.value = null;
        };

        const printPdf = async () => {
            isLoading.value = true;

            try {
                const { data } = await axios.post(`/surat/${route.params.kode}/update-file-print`, { file_tipe: fileTipe.value } );
                if (data.success == true) {
                    await nextTick();
                    document
                        .getElementById("print-iframe")
                        .contentWindow.print();
                } else {
                    notify({
                        text: "Tidak dapat memuat dokumen silahkan coba lagi",
                        type: "error",
                        duration: 2000,
                    });
                }
            } catch (e) {
                notify({
                    text: "Tidak dapat memuat dokumen silahkan coba lagi",
                    type: "error",
                    duration: 2000,
                });
            } finally {
                isLoading.value = false;
            }
            // console.log(document.getElementById("pdfRef-1"))
        };

        return {
            router,
            isLoading,
            page,
            pageCount,
            pdfSource,
            showAllPages,
            modalPdf,
            cetakFormulir,
            cetakSprkb,
            closeModal,
            printPdf,
        };
    },
};
</script>
