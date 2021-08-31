import Token from './Token'
import Storage from './Storage'

class User {
    /**
     * Submit for login
     * @param data
     */
    login(data) {
        axios.post('/api/auth/login', data)
            .then(res => this.resAfterLogin(res))
            .catch()
    }

    /**
     *
     * @param res
     */
    resAfterLogin(res) {
        const access_token = res.data.access_token
        const username     = res.data.user

        if(Token.isValid(access_token)) {
            Storage.store(username, access_token)
            window.location = '/forum'
        }
    }

    /**
     * Check token available or not in memory
     */
    hasToken() {
        const store_token = Storage.getToken()
        if(store_token) {
            return Token.isValid(store_token) ? true : false
        }
        return false
    }

    /**
     * Check user status loggedin or not
     */
    loggedIn() {
        return this.hasToken()
    }

    /**
     * User logout
     */
    logout(){
        Storage.clear()
        window.location = '/login'
    }

    /**
     * Get user username
     */
    name() {
        if(this.loggedIn()) {
            return Storage.getUser()
        }
    }

    /**
     * Get user id
     */
    id() {
        if(this.loggedIn()) {
            const payload = Token.payload(Storage.getToken())
            return payload.sub;
        }
    }

    own(id) {
        return this.id() == id
    }

    admin() {
        return this.id() == 10
    }
}
export default User = new User()
