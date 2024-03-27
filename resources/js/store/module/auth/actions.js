import Axios, * as others from "axios";
import { ACTION_SIGNUP } from "../../storeconstants";

export default{
   async [ACTION_SIGNUP](_, payload){
        let postData = {
            firstname:payload.firstname,
            lastname:payload.lastname,
            email:payload.email,
            password:payload.password,
            returnSecureToken:true,
        }
       let response = await Axios.post("https://identitytoolkit.googleapis.com/v1/accounts:signUp?key=AIzaSyDWiGtxnSorORvPHwIEwu8V4_uSKLW77mM", postData);

       console.log(response);
    },
};