export const getToken = () => {
    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (token) {
        return token.content;
    }

    return '';
}

export default {getToken};
