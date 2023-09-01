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
                    v-for="(category, index) in categories"
                    :key="index"
                >
                    <a>{{ category.name }}</a>

                    <div
                        class="category-popover"
                        :class="{ show: showPopOverIndex == index }"
                    >
                        <div
                            role="button"
                            @click="closePopOver"
                            class="close-popover"
                        >
                            <i class="las la-times"></i>
                        </div>
                        <div class="container">
                            <div class="category-icon">
                                <i :class="category.image" />
                            </div>
                            <ul
                                class="sub-category-item"
                                v-for="(
                                    sub_category, sub_index
                                ) in category.sub_categories"
                                :key="sub_index"
                            >
                                <li class="sub-category-heading">
                                    <a>{{ sub_category.name }}</a>
                                </li>
                                <div class="small-category-group">
                                    <li
                                        class="small-category-item"
                                        v-for="(
                                            small_category, small_index
                                        ) in sub_category.small_categories"
                                        :key="small_index"
                                    >
                                        <a>{{ small_category.name }}</a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other-button-group">
                <el-tooltip
                    class="box-item"
                    effect="dark"
                    content="詳細検索ができます！"
                    placement="top"
                >
                    <div class="button-item search" role="button">
                        <i class="las la-search"></i>
                    </div>
                </el-tooltip>
                <el-tooltip
                    class="box-item"
                    effect="dark"
                    content="ログインしましょう！"
                    placement="top"
                >
                    <div
                        @click="toLogin"
                        class="button-item login"
                        role="button"
                    >
                        <i class="las la-user"></i>
                    </div>
                </el-tooltip>
                <el-tooltip
                    class="box-item"
                    effect="dark"
                    content="お気に入りへ！"
                    placement="top"
                >
                    <div class="button-item favorite" role="button">
                        <i class="lar la-heart"></i>
                    </div>
                </el-tooltip>
                <el-tooltip
                    class="box-item"
                    effect="dark"
                    content="カートへ！"
                    placement="top"
                >
                    <div class="button-item cart" role="button">
                        <i class="lab la-opencart"></i>
                    </div>
                </el-tooltip>
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
        };
    },
    methods: {
        showCategoryPopOver(index) {
            this.showPopOverIndex = index;
        },
        closePopOver() {
            this.showPopOverIndex = null;
        },

        toLogin() {
            this.$router.push({ path: "/login" });
        },
    },
    computed: {
        categories() {
            return this.$store.state.master.categories;
        },
    },
};
</script>
