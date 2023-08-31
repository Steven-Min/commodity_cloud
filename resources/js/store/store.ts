import { createStore, useStore as baseUseStore } from "vuex";
import { authStore } from "./modules/auth";
import { masterStore } from "./modules/master";

export default createStore({
    modules: {
        auth: authStore,
        master: masterStore,
    },
});
