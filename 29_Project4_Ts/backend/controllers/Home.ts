import {Request, Response} from 'express';

const index = function(request:Request, response:Response){
    response.send('test');
}

export {index};