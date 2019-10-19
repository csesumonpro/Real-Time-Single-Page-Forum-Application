import Token from "./Token";
import AppStorage from "./AppStorage";

class User{
    login(data){
        axios.post('/api/auth/login',data)
            .then(res=>{
                this.responseAfterLogin(res)
            })
            .catch(err=>console.log(err.response.data))
    }
    responseAfterLogin(res){
       const access_token = res.data.access_token
       const username = res.data.user
        if(Token.isValid(access_token)){
            AppStorage.store(access_token,username)

        }
    }
    hasToken(){
        const storedToken = AppStorage.getToken();
        if (storedToken){
           return  Token.isValid(storedToken) ? true :false
        }
        return false
    }
    loggedIn(){
        return this.hasToken();
    }
    logout(){
        AppStorage.clearUserToken();
    }
    name(){
        if (this.loggedIn()){
            return AppStorage.setUser();
        }
    }
    id(){
        if (this.loggedIn()){
            const payload = Token.payload(AppStorage.getToken());
           return payload.sub
        }
        return false
    }
}

export default User =  new User();
