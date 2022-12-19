const { validationResult } = require("express-validator");
const { MASTER_DIR } = require("../helpers/constants");

const { flash } = require("../helpers/flash");

const index = (request, response) => {
    flash(request, response);

    return response.render('login', { 
        layout: MASTER_DIR, 
        title: 'Login', 
        name:request.session ?.name ?? "Visitor",
    });
};

const store = (request, response) => {
    const errors = validationResult(request);
    
    if(!errors.isEmpty()){
        request.session.messages = errors;
        return response.redirect('/login');
        // return response.status(400).json({errors: errors.array() });
    }

    request.session.messages = {
        msg: "User or password wrong",
    };

    return response.json(request.body);
};

module.exports = { index, store };