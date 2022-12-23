import {body} from "express-validator";

export const userStoreValidate = [
    body("firstName").escape().not().isEmpty().withMessage('Field required'),
    body("lastName").escape().not().isEmpty().withMessage('Field required'),
    body("email").escape().not().isEmpty().isEmail().withMessage('Invalid'),
    body("password").escape().not().isEmpty().withMessage('Field required'),
]