<template>
    <div class="product-management">
        <AdminTitle title="商品管理" />
        <!-- 商品新規追加ボタン -->
        <el-row
            type="flex"
            justify="end"
            style="position: relative; top: -3.5rem; margin-bottom: -2.5rem"
        >
            <el-button type="primary" @click="addProduct">商品を追加</el-button>
        </el-row>

        <!-- 絞り込みパート -->
        <el-card class="box-card">
            <el-row class="mb-3">
                <el-input
                    size="large"
                    v-model="filterText"
                    placeholder="商品名で検索"
                ></el-input>
            </el-row>
            <el-row type="flex" justify="end">
                <el-button type="success" @click="filterProducts"
                    >絞り込む<el-icon class="el-icon--right"><Search /></el-icon
                ></el-button>
                <el-button type="danger" @click="clearFilter"
                    >クリア<el-icon class="el-icon--right"><Refresh /></el-icon
                ></el-button>
            </el-row>
        </el-card>

        <!-- 商品一覧パート -->
        <el-table :data="filteredProducts" stripe>
            <!-- ... (前回のテーブル列の定義はそのまま) -->
        </el-table>

        <!-- ページネーションパート -->
        <el-pagination
            @size-change="handleSizeChange"
            @current-change="handleCurrentChange"
            :current-page="currentPage"
            :page-sizes="[10, 20, 30, 40]"
            :page-size="pageSize"
            layout="total, sizes, prev, pager, next, jumper"
            :total="totalProducts"
        >
        </el-pagination>
    </div>
</template>

<script lang="ts">
import { markRaw } from "vue";
import DashboardLayout from "../../../layouts/DashboardLayout.vue";
import AdminTitle from "../../../components/dashboard/AdminTitle.vue";
import { Search, Refresh } from "@element-plus/icons-vue";

export default {
    data() {
        return {
            products: [],
            filterText: "", // 絞り込み用のテキスト
            filteredProducts: [], // 絞り込み後の商品一覧
            currentPage: 1,
            pageSize: 10,
            totalProducts: 0,
        };
    },
    components: {
        AdminTitle,
        Search,
        Refresh,
    },
    created() {
        this.$emit("update:activeLayout", markRaw(DashboardLayout));
    },
    mounted() {
        this.fetchProducts();
    },
    methods: {
        fetchProducts() {
            // APIから商品をフェッチ
            // ダミーデータを使っていますが、実際にはAPIを呼び出してデータを取得してください
            this.products = [
                {
                    id: 1,
                    name: "商品1",
                    price: 1000,
                    description: "商品1の説明",
                },
                // ... その他の商品データ
            ];
            this.filteredProducts = this.products;
            this.totalProducts = this.products.length;
        },
        filterProducts() {
            if (this.filterText) {
                this.filteredProducts = this.products.filter((product) =>
                    product.name.includes(this.filterText)
                );
            } else {
                this.filteredProducts = this.products;
            }
        },
        clearFilter() {
            this.filterText = "";
            this.filteredProducts = this.products;
        },
        addProduct() {
            // 新規商品追加のロジック
            this.$router.push({ path: "/admin/products/create" });
        },
        handleSizeChange(val) {
            this.pageSize = val;
            this.fetchProducts();
        },
        handleCurrentChange(val) {
            this.currentPage = val;
            this.fetchProducts();
        },
    },
};
</script>

<style scoped>
/* 必要なスタイルをこちらに追加 */
.filter-section,
.add-product-section {
    margin-bottom: 20px;
}
</style>
