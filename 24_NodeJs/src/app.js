require("dotenv").config();

const express = require('express');

const Home = require('./controllers/Home');

const app = express();

app.get('/user', (request, response) => {
    return response.json("user");
});

app.get('/login', (request, response) => {
    return response.json("login");
});

app.listen(process.env.PORT || 3000, () => {
    console.log("Server on");
})