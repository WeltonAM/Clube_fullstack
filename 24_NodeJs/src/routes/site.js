const express = require('express');
const Home = require('../controllers/Home');
const Login = require('../controllers/Login');
const Protected = require('../controllers/Protected');

const router = express.Router();

router.get('/', Home.index);
router.get('/login', Login.index);
router.get('/protected', function(request, response, next){
    
    if(!request.session.name){
        return response.redirect('/login');
    }
    next();

}, Protected.index);
router.post('/login', Login.store);

module.exports = router;