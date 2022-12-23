import express from 'express';
import {store} from '../controllers/User';
import {userStoreValidate} from '../validations/user';

const router = express.Router();

router.post('/store', userStoreValidate, store);

export default router;