<template>
    <div class="main-layout">
        <Header />
        <slot />
    </div>
</template>
<script lang="ts">
import Header from "../components/Header.vue";
import Master from "../services/Master";
export default {
    components: {
        Header,
    },
    data() {
        return {};
    },
    async created() {
        const data = await Master.getCategories();
        this.$store.commit("master/setCategories", data.categories);
    },
};
</script>
