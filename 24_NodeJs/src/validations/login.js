const { body } = require("express-validator");

exports.login = [
    body('email').not().isEmpty().withMessage('Required field'),
    body('password').not().isEmpty().withMessage('Required field'),
    body("email").custom((value, { request }) => {
        if(value !== request.body.email){
            throw new Error("Email already exists");
        }
    }),
];