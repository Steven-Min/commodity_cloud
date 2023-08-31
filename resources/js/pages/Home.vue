<template>
    <div>
        <TopMainImage />
    </div>
</template>
<script lang="ts">
import { Vue, Options } from "vue-class-component";
import { markRaw } from "vue";
import MainLayout from "../layouts/MainLayout.vue";
import TopMainImage from "../components/common/TopMainImage.vue";
@Options({
    components: {
        TopMainImage,
    },
})
export default class Home extends Vue {
    created() {
        this.$emit("update:activeLayout", markRaw(MainLayout));
    }
}
</script>
