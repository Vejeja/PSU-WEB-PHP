function getUsernameFromCookie() {
    const cookies = document.cookie.split(';');
    for (const cookie of cookies) {
        const [name, value] = cookie.trim().split('=');
        if (name === 'username') {
            return decodeURIComponent(value);
        }
    }
    return null;
}


const usernameElement = document.getElementById('username');
const username = getUsernameFromCookie();
if (username) {
    usernameElement.textContent = `Пользователь: ${username}`;
}