const { validationResult } = require("express-validator");
const { MASTER_DIR } = require("../helpers/constants");

const index = (request, response) => {
    
    return response.render('login', { 
        layout: MASTER_DIR, 
        title: 'Login', 
        name:request.session ?.name ?? "Visitor",
    });
};

const store = (request, response) => {
    const errors = validationResult(request);
    
    if(!errors.isEmpty()){
        return response.status(400).json({errors: errors.array() });
    }

    return response.json(request.body);
};

module.exports = { index, store };