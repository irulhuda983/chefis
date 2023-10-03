<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed top-0 bottom-0 left-0 right-0 z-[9999]">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
        leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-white/20 backdrop-blur-sm transition-opacity" />
      </TransitionChild>
      <div class="fixed z-10 inset-0 overflow-y-auto overflow-x-hidden box-border p-10 pl-52 rounded-sm">
        <div class="relative flex items-end sm:items-center justify-center items-center h-full text-center bg-[#F5F5F5]">
          <TransitionChild as="template" enter="ease-out duration-300"
            enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
            leave-from="opacity-100 translate-y-0 sm:scale-100"
            leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class="relative overflow-hidden transform transition-all w-full h-full">
              <slot name="modal-body"></slot>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import {
  Dialog,
  DialogPanel,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";

export default {
  components: {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
  },
  data() {
    return {
      open: false,
    };
  },
  methods: {
    close() {
      this.open = false
    }
  }
};
</script>
