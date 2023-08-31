<template>
    <div class="header">
        <div class="container d-flex align-items-center">
            <h1 class="logo mb-0 mt-0">
                <a>
                    <img src="/images/icons/logo.png" alt="logo" />
                </a>
            </h1>
            <div class="category-button-group">
                <div
                    @mouseover="showCategoryPopOver(index)"
                    class="category-button"
                    v-for="(category, index) in CATEGORIES"
                    :key="index"
                >
                    <a>{{ category }}</a>

                    <div
                        class="category-popover"
                        :class="{ show: showPopOverIndex == index }"
                    >
                        <div class="container">sdfsdf</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
export default {
    name: "HeaderComponent",
    data() {
        return {
            showPopOverIndex: null,

            CATEGORIES: ["WOMEN", "MEN", "KIDS", "BABY"],
        };
    },
    methods: {
        showCategoryPopOver(index) {
            this.showPopOverIndex = index;
        },
    },
};
</script>
