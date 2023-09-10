<template>
    <div class="flex align-items-center justify-content-center h-screen">
        <div class="surface-card p-4 shadow-2 border-round w-80 lg:w-3">
            <div class="text-center mb-5">
                <img
                    src="/images/icons/logo.png"
                    alt="Image"
                    height="100"
                    class="mb-0"
                />
                <div
                    class="text-900 text-3xl font-medium mb-3 font-bold comic-text"
                >
                    SIGN IN
                </div>
            </div>
            <div>
                <label
                    for="email1"
                    class="block text-900 font-medium mb-2 font-bold"
                    >メールアドレス</label
                >
                <InputText
                    id="email1"
                    type="text"
                    v-model="user.email"
                    class="w-full mb-3"
                />

                <label
                    for="password1"
                    class="block text-900 font-medium mb-2 font-bold"
                    >パスワード</label
                >
                <InputText
                    id="password1"
                    type="password"
                    v-model="user.password"
                    class="w-full mb-3"
                />

                <Button label="ログイン" @click="login" class="w-full"></Button>
            </div>
            <div>
                <div class="to-register-link">
                    アカウントを持っていない方は<router-link
                        :to="{ name: 'register' }"
                        >こちら</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import UserAuth from "../../services/UserAuth";
import { markRaw } from "vue";
import ResponseData from "../../types/ResponseData";
import AuthLayout from "../../layouts/AuthLayout.vue";

export default {
    data() {
        return {
            checked: false,
            user: {
                email: "",
                password: "",
            },
        };
    },
    created() {
        this.$emit("update:activeLayout", markRaw(AuthLayout));
    },
    methods: {
        login() {
            UserAuth.login(this.user)
                .then((response: ResponseData) => {
                    if (response.data.success) {
                        this.$toast.add({
                            severity: "success",
                            summary: "ログイン成功！",
                            detail: response.data.message,
                            life: 3000,
                        });

                        if (response.data.role == "admin") {
                            this.$router.push({ path: "/admin" });
                        } else if (response.data.role == "seller") {
                            this.$router.push({ path: "/seller-dashboard" });
                        } else {
                            this.$router.push({
                                path: "/dashboard",
                            });
                        }

                        this.$store.commit("auth/isLogin", response.data);
                    } else {
                        this.$toast.add({
                            severity: "error",
                            summary: "Incorrect Credentials!",
                            detail: "Please try again",
                            life: 3000,
                        });
                    }
                })
                .catch((e: Error) => {
                    this.$toast.add({
                        severity: "error",
                        summary: e.message,
                        detail: "Please reload the page",
                        life: 3000,
                    });
                });
        },
        setLayout() {
            this.$store.commit("auth/setLayout", "Layout");

            this.$store.commit("auth/isLogin", true);
            //   this.store.getters["auth/layoutName"]
            // if (layout == 'Layout' ) {
            //   this.$router.push({ path: "/admin" })
            // } else {
            //   this.$router.push({ path: "/login" })
            // }
        },
    },
};
</script>
