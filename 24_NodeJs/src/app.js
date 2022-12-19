require("dotenv").config();

const { response } = require("express");
const express = require('express');

const Home = require('./controllers/Home');
const Login = require('./controllers/Login');

const app = express();

// app.get('/user/:id', (request, response) => {
//     return response.json(request.params.id);
// });

// app.get('/user', (request, response) => {
//     const { name, age } = request.query;
//     return response.send(name);
// });

// Middleware
app.use(function(request, response, next){
    next();
});

// Controllers
app.get('/', Home.index);

app.post('/login', 
    function(){
        return response.json("middleware");
    }, 
    Login.store);


app.listen(process.env.PORT || 3000, () => {
    console.log("Server on");
})