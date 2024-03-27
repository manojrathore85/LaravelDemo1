export default class validation{
    static checkEmail(email){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return true;
        } else {
            return false;
        }
    }
    static minLength(name,minLength){
        if(name.length < minLength){
            return false;
        }else{
            return  true;
        }
    }

}