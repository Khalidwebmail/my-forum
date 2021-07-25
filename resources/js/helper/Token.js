class Token {
    /**
     *
     * @param token
     */
    payload(token) {
        const payload = token.split('.')[1]
        return this.decode(payload)
    }

    /**
     *
     */
    decode() {
        return JSON.parse(atob(payload))
    }

    /**
     * 
     * @param token
     */
    isValid(token) {
        const payload = this.payload(token);
        if(payload) {
            return payload.iss == 'http://localhost:8000/api/auth/login' ? true : false
        }
        return false
    }
}

export default Token = new Token()
