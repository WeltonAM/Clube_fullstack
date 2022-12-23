import {Request, Response} from 'express';
import { validationResult } from 'express-validator';
import { getRepository, getTreeRepository } from 'typeorm';
import { User } from '../database/src/entity/User';
import bcrypt from 'bcryptjs';

const store = async function(request:Request, response:Response){
    try {
        const errors = validationResult(request);

        if(!errors.isEmpty()){
            return response.status(400).json({errors: errors.array()});
        }

        const repo = getTreeRepository(User);

        request.body['password'] = bcrypt.hashSync(request.body['password'], 10);

        const created = await repo.save(request.body);

        if(created){
            return response.json('USER_CREATED').status(200);
        }

        response.json('USER_NOT_CREATED').status(400);

    } catch (error) {
        console.log(error);
    }
}

const show = async function(request:Request, response:Response){
    try {
        const repo = getRepository(User);

        const user = await repo.findOne({
            where: {
                id: request.query['id'],
            }
        });

        response.status(200).json(user);

    } catch (error) {
        console.log(error);
    }
}

export {store, show};