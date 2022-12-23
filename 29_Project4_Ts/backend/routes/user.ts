import express from 'express';
import {store, show} from '../controllers/User';
import {userStoreValidate} from '../validations/user';

const router = express.Router();

router.post('/store', userStoreValidate, store);
router.get('/show', show);

export default router;