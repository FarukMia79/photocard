class AppStorage {
    storeToken(token) {
        localStorage.setItem('token', token);
    }

    storeUser(user) {
        localStorage.setItem('user', JSON.stringify(user));
    }

    store(token, user) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    getToken() {
        return localStorage.getItem('token');
    }

    getUser() {
        const user = localStorage.getItem('user');
        return user ? JSON.parse(user) : null;
    }

    getRole() {
        const user = this.getUser();
        return localStorage.getItem('user_role') || (user ? user.role : null);
    }

}

export default new AppStorage();
