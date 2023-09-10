<template>
    <div></div>
</template>
<script lang="ts">
import { markRaw } from "vue";
import DashboardLayout from "../../../layouts/DashboardLayout.vue";

export default {
    created() {
        this.$emit("update:activeLayout", markRaw(DashboardLayout));
    },
};
</script>
