class AppStorage {
    setToken(token){
        localStorage.setItem('token',token);
    }
    setUser(user){
        localStorage.setItem('user',user);
    }
    store(token,user){
        this.setToken(token);
        this.setUser(user);
    }
    clearUserToken(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }
    getToken(){
       return localStorage.getItem('token');
    }
    getUser(){
        return localStorage.getItem('user');
    }
}
export default AppStorage = new AppStorage();
