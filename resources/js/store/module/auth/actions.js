import Axios, * as others from "axios";
import { ACTION_SIGNUP } from "../../storeconstants";
//import { handleError } from "../../../services/handleError";
Axios.defaults.baseURL = '/api';    
export default{
    
   async [ACTION_SIGNUP](_, payload){
        try {
            let response = await Axios.post("register", payload);
            console.log(response.data); // Log response data for debugging
        } catch (error) {
            console.log(error); // Log any errors that occur during the request
        }
    },
};