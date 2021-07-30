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
        }
    }
}
export default User = new User()
