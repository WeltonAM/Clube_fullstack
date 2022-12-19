const { MASTER_DIR } = require("../helpers/constants");

const index = (request, response) => {
    
    return response.render('login', { 
        layout: MASTER_DIR, 
        title: 'Login', 
        name:request.session ?.name ?? "Visitor",
    });
};

const store = (request, response) => {
    return response.json(request.body);
};

module.exports = { index, store };