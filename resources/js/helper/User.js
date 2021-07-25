/**
 *
 */
class User {
    /**
     * Submit for login
     * @param data
     */
    login(data) {
        axios.post('/api/auth/login', data)
            .then((res)=>{
                console.log(res.data.access_token)
            })
            .catch(function (error){
                console.log(error.res.data)
            })
    }
}
export default User = new User()
