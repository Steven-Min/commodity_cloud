import axios from "axios";

class Master {
    baseUrl: string;
    constructor() {
        this.baseUrl = "api";
    }

    async getCategories() {
        const response = await axios.get(this.baseUrl + "/categories");
        return response.data;
    }
}

export default new Master();
