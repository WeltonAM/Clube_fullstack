const { MASTER_DIR } = require("../helpers/constants");

const index = (request, response) => {
    return response.render('login', { layout: MASTER_DIR, title: 'Login' });
};

module.exports = { index };