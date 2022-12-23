import {Request, Response} from 'express';
import { validationResult } from 'express-validator';

const store = async function(request:Request, response:Response){
    try {
        const errors = validationResult(request);

        if(!errors.isEmpty()){
            return response.status(400).json({errors: errors.array()});
        }

    } catch (error) {
        console.log(error);
    }
}

export {store};