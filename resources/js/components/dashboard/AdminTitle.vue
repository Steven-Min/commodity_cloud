<template>
    <div class="admin-title">{{ title }}</div>
</template>
<script lang="ts">
export default {
    props: {
        title: {
            type: String,
            required: true,
        },
    },
};
</script>
