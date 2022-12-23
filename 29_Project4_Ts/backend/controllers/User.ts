import {Request, Response} from 'express';

const store = function(request:Request, response:Response){
    response.json("user store");
}

export {store};