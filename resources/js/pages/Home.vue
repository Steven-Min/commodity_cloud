<template>
    <div>
        <TopMainImage />
    </div>
</template>
<script lang="ts">
import { markRaw } from "vue";
import MainLayout from "../layouts/MainLayout.vue";
import TopMainImage from "../components/common/TopMainImage.vue";

export default {
    components: {
        TopMainImage,
    },
    created() {
        this.$emit("update:activeLayout", markRaw(MainLayout));
    },
};
</script>
