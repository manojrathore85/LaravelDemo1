import { createStore } from "vuex";
import auth from './module/auth/index';
const store = createStore({
    modules:{
        auth,
    }
});
export default store;