import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";
export default{
    namespaced:true, 
    state(){
        return {
            name: 'state leela',
            token: localStorage.getItem('authToken') || '',
            user: null,
        };
    },
    mutations,
    getters,
    actions,

};