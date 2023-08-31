<template>
    <div>
        <Header />
    </div>
</template>
<script lang="ts">
import { Options, Vue } from "vue-class-component";
import Header from "../components/Header.vue";
@Options({
    components: {
        Header,
    },
})
export default class MainLayout extends Vue {
    created() {}

    mounted() {}
}
</script>
