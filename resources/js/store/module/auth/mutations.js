export default {
    SET_TOKEN(state, token) {
        state.token = token;
    },
    SET_USER(state, user) {
        state.user = user;
    },
    CLEAR_AUTH(state) {
        state.token = "";
        state.user = null;
        localStorage.removeItem("authToken");
    },
};
