const { MASTER_DIR } = require("../helpers/constants");

const index = function(request, response) {
    request.session.name = 'Welton';
    response.redirect('/login');
    // return response.render("home", { layout: MASTER_DIR, title:'Home' });
}

const show = function(request, response) {
    const { name, age } = request.query;
    return response.json(name);
}

module.exports = { index, show };