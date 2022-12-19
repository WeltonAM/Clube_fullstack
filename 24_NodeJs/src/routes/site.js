const express = require('express');
const Home = require('../controllers/Home');
const Login = require('../controllers/Login');

const router = express.Router();

router.get('/', Home.index);
router.get('/login', Login.index);

module.exports = router;