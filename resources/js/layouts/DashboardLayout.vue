<template>
    <header>
        <AppTopbar @toggle-sidebar="toggleSidebar" />
    </header>
    <main>
        <Sidebar
            class="layout-sidebar"
            :showCloseIcon="false"
            :modal="false"
            v-model:visible="visibleLeft"
        >
            <Menu
                class="sidebar-item border-noround border-none"
                :model="sidebarItems"
            />
        </Sidebar>
        <div class="layout-main">
            <div class="layout-content pt-7 pb-6 px-5">
                <slot />
            </div>
            <div
                class="layout-footer flex align-items-center justify-content-between"
            >
                <AppFooter />
            </div>
        </div>
    </main>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import AppTopbar from "../components/AppTopbar.vue";
import AppFooter from "../components/AppFooter.vue";
import { useRouter } from "vue-router";

export default {
    components: {
        AppTopbar,
        AppFooter,
    },
    data() {
        return {
            showSidebar: true,
            visibleLeft: false,
            sidebarItems: [
                {
                    label: "General",
                    items: [
                        {
                            label: "ダッシュボード",
                            to: "/admin",
                        },
                        {
                            label: "Reservations",
                            to: "/reservations",
                        },
                        {
                            label: "Types and Rates",
                            to: "/car-type",
                        },
                        {
                            label: "Extras",
                        },
                        {
                            label: "Office Locations",
                        },
                        {
                            label: "Users",
                        },
                    ],
                },
                {
                    label: "商品管理",
                    items: [
                        {
                            label: "商品一覧",
                            to: "/admin/products",
                        },
                        {
                            label: "商品登録",
                            to: "/admin/products/create",
                        },
                    ],
                },
                {
                    label: "Car Inventory",
                    items: [
                        {
                            label: "Cars",
                            to: "/car-inventory",
                        },
                        {
                            label: "Availability",
                            to: "/availibility",
                        },
                    ],
                },
                {
                    label: "Options",
                    items: [
                        {
                            label: "Rental Settings",
                        },
                        {
                            label: "Payments",
                        },
                        {
                            label: "Checkout Form",
                        },
                        {
                            label: "Notificatins",
                        },
                        {
                            label: "Terms",
                        },
                    ],
                },
                {
                    label: "System Options",
                    items: [
                        {
                            label: "General",
                        },
                        {
                            label: "API Keys",
                        },
                        {
                            label: "Email Settings",
                        },
                        {
                            label: "SMS Settings",
                        },
                        {
                            label: "Languages",
                        },
                        {
                            label: "Login & Protection",
                        },
                        {
                            label: "Countries",
                        },
                        {
                            label: "Corn Jobs",
                        },
                    ],
                },
            ],
        };
    },
    created() {
        window.addEventListener("resize", this.onResize);
        if (window.innerWidth < 960) {
            this.showSidebar = false;
        } else {
            this.showSidebar = true;
        }
    },
    methods: {
        toggleSidebar() {
            // this.showSidebar = (this.showSidebar) ? false : true
            this.visibleLeft = this.visibleLeft ? false : true;
        },

        onResize() {
            if (window.innerWidth < 960) {
                this.showSidebar = false;
            } else {
                this.showSidebar = true;
            }
        },
    },
};
</script>
<style scoped>
.progress-bar {
    height: 0.2rem;
}
</style>
