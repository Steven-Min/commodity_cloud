export const masterStore = {
    namespaced: true,
    state: () => ({
        categories: [],
    }),
    mutations: {
        setCategories(state: any, categories: any[]) {
            state.categories = categories;
        },
    },
    getters: {
        categories(state: any) {
            return state.categories;
        },
    },
};
