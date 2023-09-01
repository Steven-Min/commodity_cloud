<template>
    <div class="container-md pt-6 pb-8">
        <h2 class="comic-text text-4xl d-flex align-items-center">
            CREATE AN ACCOUNT
            <div class="ml-auto">
                <el-tooltip
                    class="box-item"
                    effect="dark"
                    content="お客様の機密情報はすべて、TLS (Transport Layer Security) 暗号化テクノロジーによって暗号化されます。"
                    placement="top"
                >
                    <i class="las la-lock text-3xl"></i>
                </el-tooltip>
            </div>
        </h2>
        <div class="form-container">
            <div class="text-center">
                アカウントに関連付けられた貴方のメールアドレスに確認メールが届きます。
                貴方の受信メールを必ず確認してください。
            </div>
            <div class="text-right relative font-bold mb-10" style="top: -20px">
                必須：<span style="color: var(--accent-color)">*</span>
            </div>
            <div class="form-row">
                <label>メールアドレス<span class="require">*</span></label>
                <div class="flex-1">
                    <el-input
                        v-model="formData.email"
                        class="form-input"
                        placeholder="例）yamamoto@example.com"
                    />
                </div>
            </div>
            <div class="form-row">
                <label>パスワード<span class="require">*</span></label>
                <div class="flex-1">
                    <el-input
                        v-model="formData.password"
                        :show-password="true"
                        type="password"
                        class="form-input"
                        placeholder="********"
                    />
                    <div class="mt-1 attention">
                        パスワードは8文字以上で、文字と数字の両方を含む必要があります。
                        これらの記号だけが使用できます -._@
                    </div>
                </div>
            </div>
            <div class="form-row">
                <label>郵便番号<span class="require">*</span></label>
                <div class="flex-1">
                    <el-input
                        v-model="formData.zipcode"
                        class="form-input w-2"
                        placeholder="例）150-0013"
                        @change="changedZipCode"
                    />
                    <div class="mt-1 attention">
                        入力いただく郵便番号によって住所が自動的に表示されます。
                    </div>
                </div>
            </div>
            <div v-if="isFiltering">
                <el-progress :percentage="100" :indeterminate="true" />
            </div>
            <div class="form-row" v-if="formData.prefecture">
                <label>都道府県</label>
                <div class="flex-1" style="margin-top: 10px">
                    {{ formData.prefecture }}
                </div>
            </div>
            <div class="form-row" v-if="formData.city">
                <label>市区町村</label>
                <div class="flex-1" style="margin-top: 10px">
                    {{ formData.city }}
                </div>
            </div>
            <div class="form-row" v-if="formData.street">
                <label>住所詳細</label>
                <div class="flex-1" style="margin-top: 10px">
                    {{ formData.street }}
                </div>
            </div>
            <div class="form-row">
                <label>生年月日</label>
                <div class="flex-1">
                    <el-date-picker
                        v-model="formData.birthday"
                        type="date"
                        placeholder="例）1990/01/01"
                        size="large"
                    />
                    <div class="mt-1 attention">
                        生年月日を入力いただくことによって、年齢に当たる商品の提案ができます
                    </div>
                </div>
            </div>
            <div class="form-row">
                <label>性別</label>
                <div class="flex-1">
                    <el-radio-group class="mt-1" v-model="formData.gender">
                        <el-radio :label="1">男性</el-radio>
                        <el-radio :label="2">女性</el-radio>
                        <el-radio :label="3">公開したくない</el-radio>
                    </el-radio-group>
                </div>
            </div>
            <div class="form-row">
                <label>通知設定</label>
                <div class="flex-1">
                    <el-checkbox
                        v-model="formData.available_notification"
                        label="定期お知らせを許可する"
                        size="large"
                    />
                    <div class="mt-1 attention">
                        定期的に発行される【商品雲】からのお知らせをメールで受け取れます。
                    </div>
                </div>
            </div>
            <div class="divider mt-5 mb-5"></div>
            <div>
                <h2 class="text-center">利用規約・プライバシーポリシー</h2>
                <div class="text-center font-medium mt-2">
                    アカウントを作成いただくことによって【商品雲】の利用規約とプライバシーポリシーに同意いただいたことになります。
                </div>
                <div class="text-center pt-2">
                    <el-checkbox
                        class="font-bold"
                        v-model="agree_term"
                        label="利用規約とプライバシーポリシーに同意する"
                        size="large"
                    />
                </div>
                <div
                    class="d-flex align-items-center justify-content-center pt-1"
                >
                    <el-button type="primary" class="text-decoration" link
                        >利用規約</el-button
                    >
                    <el-button type="primary" class="text-decoration" link
                        >プライバシーポリシー</el-button
                    >
                </div>
            </div>
            <div class="text-center pt-5">
                <el-button type="primary" size="large" class="h-3rem w-3"
                    >新規登録する</el-button
                >
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import UserAuth from "../../services/UserAuth";
import { markRaw } from "vue";
import ResponseData from "../../types/ResponseData";
import MainLayout from "../../layouts/MainLayout.vue";
import postal_code from "japan-postal-code";

class Props {
    settings = {
        logo: "",
    };
}

@Options({
    components: {},
})
export default class Register extends Vue.with(Props) {
    // store = useStore()
    checked = false;
    formData = {
        email: null,
        password: null,
        zipcode: null,
        prefecture: null,
        city: null,
        street: null,
        birthday: null,
        gender: null,
        available_notification: false,
    };
    agree_term = false;
    isFiltering = false;

    created() {
        this.$emit("update:activeLayout", markRaw(MainLayout));
    }

    register() {
        // UserAuth.login(this.user)
        //     .then((response: ResponseData) => {
        //         if (response.data.success) {
        //             this.$toast.add({
        //                 severity: "success",
        //                 summary: "Login Successful!",
        //                 detail: "Welcome to the dashboard",
        //                 life: 3000,
        //             });
        //
        //             // if (response.data.user.roles[0].name == "admin") {
        //             this.$router.push({ path: "/admin" });
        //             // } else if (response.data.user.roles[0].name == "manager") {
        //             //   this.$router.push({ path: "/manager-dashboard" });
        //             // } else {
        //             //   this.$router.push({ path: "/participant-dashboard" });
        //             // }
        //
        //             this.$store.commit("auth/isLogin", response.data);
        //         } else {
        //             this.$toast.add({
        //                 severity: "error",
        //                 summary: "Incorrect Credentials!",
        //                 detail: "Please try again",
        //                 life: 3000,
        //             });
        //         }
        //     })
        //     .catch((e: Error) => {
        //         this.$toast.add({
        //             severity: "error",
        //             summary: e.message,
        //             detail: "Please reload the page",
        //             life: 3000,
        //         });
        //     });
    }

    changedZipCode() {
        const zipcode = this.formData.zipcode.replace("-", "");
        let self = this;
        this.isFiltering = true;
        setTimeout(() => {
            postal_code.get(zipcode, function (address) {
                self.formData.prefecture = address.prefecture;
                self.formData.city = address.city;
                self.formData.street = address.area;
                self.isFiltering = false;
            });
        }, 2000);
    }
}
</script>
