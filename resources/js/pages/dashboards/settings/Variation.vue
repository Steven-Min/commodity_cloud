<template>
    <div>
        <AdminTitle title="バリエーション管理111" />
        asdfasdfasdfas123123111
    </div>
</template>
<script lang="ts">
import AdminTitle from "../../../components/dashboard/AdminTitle.vue";
import { markRaw, ref } from "vue";
import DashboardLayout from "../../../layouts/DashboardLayout.vue";

export default {
    components: { AdminTitle },
    created() {
        this.$emit("update:activeLayout", markRaw(DashboardLayout));
    },
    data() {
        return {};
    },
    methods: {},
};
</script>
