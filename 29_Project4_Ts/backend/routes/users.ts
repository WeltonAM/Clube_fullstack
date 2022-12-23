import express from 'express';
import {index} from '../controllers/Users';

const router = express.Router();

router.get('/', index);

export default router;