class Storage {
    /**
     *
     * @param token
     */
    storeToken(token) {
        localStorage.setItem('token', token)
    }

    /**
     *
     * @param user
     */
    storeUser(user) {
        localStorage.setItem('user', user)
    }

    /**
     * Store user info to local storage
     * @param user
     * @param token
     */
    store(user, token) {
        this.storeToken(token)
        this.storeUser(user)
    }

    /**
     *
     */
    clear() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
    }

    /**
     *
     */
    getToken() {
        return localStorage.getItem('token')
    }

    /**
     *
     */
    getUser() {
        return localStorage.getItem('user')
    }
}

export default Storage = new Storage()
